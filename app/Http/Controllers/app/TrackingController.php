<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index() {

        return view('app.dashboard', array(
                "name_page" => "Dashboard"
            )
        );

    }

}
