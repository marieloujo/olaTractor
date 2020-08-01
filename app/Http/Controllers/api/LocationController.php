<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Modeles\Louer;
use App\Modeles\Localite;
use App\Http\Resources\Tracteur as TracteurResource;
use App\User;




class LocationController extends Controller
{


    public function index()
    {
        return Louer::all();
    }


    public function localites() {

        return Localite::all();
    }
    


    public function listes_des_demandes_de_location($idUser) {

        $user = User::findOrFail($idUser); //tracteurs_louer

        return TracteurResource::Collection($user->tracteurs_louer);


        /*return DB::table('tracteurs')

                ->join('louer', 'tracteurs.id', '=', 'louer.tracteur_id')
                ->join('users', 'tracteurs.user_id', '=', 'users.id')
                ->join('localites', 'users.id_localite', '=', 'localites.id')


                ->where('louer.is_paie', '=', 0)
                ->where('louer.utilisateur_id', '=', $idUser)

                ->select('tracteurs.*', 'users.name', 'localites.libelle')
                
                ->get();*/
        

    }



    public function store(Request $request) {

        return response()->json( Louer::create($request->all()), 201);
        
    }




    public function update(Request $request, $id) {

        $location = Louer::findOrFail($id);
        $location->update($request->all());

        return response()->json( $location,200);
    
    }






}
