<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\User;

class UserController extends Controller
{


    public function index() {

        return view('app.users', array(
                "name_page" => "Utilisateur"
            )
        );

    }



    public function proprietaire() {

        return view('app.users', array(
                "name_page" => "Proprietaire",
                "users" => User::where('role', 'Proprietaire')->get()
            )
        );

    }



    public function agricoles() {

        return view('app.users', array(
                "name_page" => "Agricoles",
                "users" => User::where('role', 'Agricole')->get()
            )
        );

    }



    public function profile(Request $request) {


        return view('app.user-profile', array(
                "name_page" => "Profile",
                "user" => User::where('id', Auth::id())->first()
            )
        );

    }




    public function profilebyUser(Request $request, $idUser) {


        return view('app.user-profile', array(
                "name_page" => "Profile",
                "user" => User::where('id', $idUser)->first()
            )
        );

    }




    public function upadate_profile(Request $request) {

        User::where('id', Auth::id())
            ->update([
                'name'=>$request->name, 
                'email'=>$request->email, 
                'telephone'=>$request->telephone,
                'sexe'=>$request->sexe,
                'age'=>$request->age
            ]
        );

        Session::flash('success', 'Profile modifié avec succèss !');
        return redirect()->back();

    }



    public function pieces_fournir(Request $request, $idUser) {

        $user = User::find($idUser);
        $pieces = [];


        array_push($pieces, public_path().'/pieces_fournir/'.$user->acte_naissance);
        array_push($pieces, public_path().'/pieces_fournir/'.$user->certificat_nationalite);
        array_push($pieces, public_path().'/pieces_fournir/'.$user->carte_identite);

        return response()->file($pieces);

        foreach ($pieces as $key => $piece) {

            return response()->files($piece);
            
        }



    }


}
