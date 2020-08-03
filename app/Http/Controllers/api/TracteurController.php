<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Tracteur as TracteurResource;
use App\User;
use App\Modeles\Tracteur;
use App\Modeles\Localite;
use App\Modeles\Tracking;



class TracteurController extends Controller
{
    

    public static $localites_environnantes = [];
    public static $localites_environner = [];


    public function index()
    {
        return  TracteurResource::Collection(Tracteur::all());
    }


    public function tracteurs_disponible_proximite($idUser)
    {
        $user = User::findOrFail($idUser);

        foreach($user->localite->localites_environnantes as $index => $environnantes) {
            static::$localites_environnantes[$index] = $environnantes->id;
        }


        foreach($user->localite->localites_environner as $index => $environner) {
            static::$localites_environner[$index] = $environner->id;
        }



        return

            DB::table('tracteurs')

                ->join('users', 'tracteurs.user_id', '=', 'users.id')
                ->join('localites', 'users.id_localite', '=', 'localites.id')

                ->where('localites.id', '=', $user->localite->id)
                ->orWhere(function($query) {
                    $query->whereIn('localites.id', static::$localites_environnantes);})
                ->orWhere(function($query) {
                    $query->whereIn('localites.id', static::$localites_environner);})

                ->leftJoin('louer', 'tracteurs.id', '=', 'louer.tracteur_id')

                ->select('tracteurs.*', 'louer.utilisateur_id as locataire_id')
                ->groupBy('tracteurs.id')
                ->get();


        /*return 
            DB::table('tracteurs')
                ->leftJoin('louer', 'tracteurs.id', '=', 'louer.tracteur_id')

                ->Where(function($query) {

                    $query  ->where('louer.is_paie', 0 )
                            ->where('louer.is_valid', 0 )
                            ->whereNull('louer.date_emprunt')
                            ->whereNull('louer.date_retour');
                })

                ->orWhere(function($query) {

                    $query  ->where('louer.is_paie', 1 )
                            ->where('louer.is_valid', 1 )
                            ->whereNotNull('louer.date_emprunt')
                            ->whereNotNull('louer.date_retour');
                })


                ->select('tracteurs.*', 'louer.id as louer')
                ->get();
        */


    }



    public function store_tracking(Request $request) {

        return response()->json(Tracking::create($request->all()), 201);
        
    }






    

}
