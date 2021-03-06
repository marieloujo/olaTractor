<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {

            if($request->input('hidden') != null) {

                return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());

            } else {

                $user = $this->guard()->user();
                $user->generateToken();

                return response()->json($user);
                
            }
        }

        return $this->sendFailedLoginResponse($request);
    }
    


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

}
