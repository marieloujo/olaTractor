<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Modeles\Tracteur;
use App\User;


class DashboardController extends Controller
{
    

    public function index() {

        $tracteurs;

        if(Auth::user()->role == 'admin') {

            $tracteurs = Tracteur::count();

        } else {

            $tracteurs = Tracteur::where('id', Auth::id())->count();

        }

        return view('app.dashboard', array(
                "name_page" => "Dashboard",
                "tracteurs" => $tracteurs,
                "users" => User::count(),
                "agricoles" => User::where('role', 'Agricole')->count(),
                "proprietaires" => User::where('role', 'proprietaire')->count()
            )
        );

    }


}
