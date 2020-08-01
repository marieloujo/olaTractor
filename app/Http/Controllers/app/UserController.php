<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index() {

        return view('app.users', array(
                "name_page" => "Proprietaire"
            )
        );

    }

    public function profile() {

        return view('app.user-profile', array(
                "name_page" => "Profile"
            )
        );

    }

}
