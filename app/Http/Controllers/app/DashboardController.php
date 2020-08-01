<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modeles\Tracteur;


class DashboardController extends Controller
{
    

    public function index() {

        $tracteurs =  Tracteur::all();
        $nombre = $tracteurs->count();

        return view('app.dashboard', array(
                "name_page" => "Dashboard"
            ),
            compact('nombre')
        );

    }


}
