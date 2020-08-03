<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Modeles\Tracteur;
use App\Modeles\Localite;

use Carbon\Carbon;
use App\Exports\TracteursExport;
use Maatwebsite\Excel\Facades\Excel;



class TracteurController extends Controller
{


    public function index() {

        $tracteurs;

        if(Auth::user()->role == 'admin') {

            $tracteurs = Tracteur::all();

        } elseif(Auth::user()->role == 'proprietaire'){

            $tracteurs = Tracteur::where('user_id', ''.Auth::id())->get();
        } 

        //dump(Auth::user()->unreadNotifications).die();


        return view('app.tracteurs', array(
                "name_page" => "Tracteur",
                "notification" => Auth::user()->unreadNotifications
            ), 
            compact('tracteurs')
        );

    }



    public function findbyUser($idUser)
    {

        $tracteurs = Tracteur::where('user_id', ''.$idUser)->get();
       
        return view('app.tracteurs', array(
                "name_page" => "Tracteur",
                "notification" => Auth::user()->unreadNotifications
            ), 
            compact('tracteurs')
        );

        
    }




    public function store(Request $request)
    {
        
        $add_trateur = Tracteur::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'marque' => $request->marque,
            'modele' =>$request->modele,
        ]);

        Session::flash('success','Tracteur ajouté avec succès.');
        return redirect()->route('app_tracteurs');
    
    }



    public function update(Request $request, $id)
    {

        $type = $request->type;
        $marque = $request->marque;
        $modele = $request->modele;
        
        Tracteur::where('id', $id)->update(['type'=>$type, 'marque'=>$marque, 'modele'=>$modele]);
        

        Session::flash('success', 'Tracteur modifié avec succès !');
        return redirect()->back();

    }



    public function destroy($id)
    {

        Tracteur::findOrFail($id)->delete();

        Session::flash('success', 'Tracteur supprimé avec succès !');
        return redirect()->back();

    }


    public function export() {

        return Excel::download(new TracteursExport, 'tracteurs.xlsx');

    }





    public function tracking($idTracteur) {

        $object = array();
        $value = [];

    

        $trackings = Tracteur::find($idTracteur)->tracking;


        if(empty($trackings)) {

            $value[] = [];

            return view('app.trackings', array(
                'trackings' => $value, 'name_page'=>'tracking')
            ); 
        }  else {

        

            foreach($trackings as $tracking) {

                if( isset($object[$tracking->date])) {

                    array_push($object[$tracking->date], $tracking);

                } else{

                    $object[$tracking->date] = [];
                    array_push($object[$tracking->date], $tracking);
                }

                
            }

            //dump($object).die();

            foreach($object as $index) {

                $start = Carbon::parse($index[0]->time);
                $end = Carbon::parse(end($index)->time);
                $hours = $end->diffInHours($start);
                $munites = $end->diffInMinutes($start);
                $seconds = $end->diffInSeconds($start);

                $duree = $hours .'h '. $munites. ' mn ' . $seconds .'s';
                $distance;


                if (($index[0]->latitude == end($index)->latitude) && 
                    ($index[0]->longitude == end($index)->longitude)) {

                    return 0;

                }
        
                else {
        
                    $theta = $index[0]->longitude - end($index)->longitude;
                    $dist = sin(deg2rad($index[0]->latitude)) * sin(deg2rad(end($index)->latitude)) + 
                            cos(deg2rad($index[0]->latitude)) * cos(deg2rad(end($index)->latitude)) * cos(deg2rad($theta));
                    
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
        
                    $distance = ($miles * 1.609344);

                } 

                $kj = explode(":", gmdate('H:i:s', $seconds))[0].' h '
                        .explode(":", gmdate('H:i:s', $seconds))[1].' mn '
                        .explode(":", gmdate('H:i:s', $seconds))[2]. ' s';

                if($hours != 0) {
                    $vitesse = $distance/$hours . 'km/h';
                } elseif($munites != 0) {
                    $vitesse = $distance/$munites . ' km/h';
                } else {
                    $vitesse = $distance/$seconds . ' km/h';
                }
                    

                $value[] = [
                    'date' => $index[0]->date, //Carbon::parse($index[0]->time)->diffForHumans(),
                    'distance' => $distance .' Km',
                    'temps' => $kj,
                    'vitesse' => $vitesse
                ];

            }

            return view('app.trackings', array(
                'trackings' => $value, 'name_page'=>'tracking')
            ); 

        }


    }


    
}
