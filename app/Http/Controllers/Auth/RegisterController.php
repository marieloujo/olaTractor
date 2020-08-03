<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;


use App\User;
use App\Http\Resources\User as UserResource;


use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'min:8', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        //dump($data).die();

        $file_acte_naissance_name = null;
        $file_certificat_nationalite_name = null;
        $file_carte_identite_name = null;

        if($data['acte_naissance'] != null && $data['certificat_nationalite'] != null && $data['carte_identite'] != null) {
            
            $file_acte_naissance_name = $data['name']
                        .'_acte_naissance.'
                        .$data['acte_naissance']->getClientOriginalExtension();
            $file_certificat_nationalite_name = $data['name']
                        .'_certificat_nationalite.'
                        .$data['certificat_nationalite']->getClientOriginalExtension();
            $file_carte_identite_name = $data['name']
                        .'_carte_identite.'
                        .$data['carte_identite']->getClientOriginalExtension();


            $acte_naissanceFile = $data['acte_naissance'];
            $acte_naissanceFile->move(public_path().'/pieces_fournir',$file_acte_naissance_name);
        
            $certificat_nationaliteFile = $data['certificat_nationalite'];
            $certificat_nationaliteFile->move(public_path().'/pieces_fournir',
                            $file_certificat_nationalite_name);

            $carte_identiteFile = $data['carte_identite'];
            $carte_identiteFile->move(public_path().'/pieces_fournir',$file_carte_identite_name);
        }



        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'age' => $data['age'],
            'sexe' => $data['sexe'],
            'telephone' => $data['telephone'],

            'acte_naissance' => $file_acte_naissance_name,
            'certificat_nationalite' => $file_certificat_nationalite_name,
            'carte_identite' => $file_carte_identite_name,

            'id_localite' => $data['localite'],
            'role' => $data['role']
        ]);


    }


    protected function registered(Request $request, $user)
    {
        if($request->input('hidden') != null) {
            return null;
        } else {

            $user->generateToken();

            return response()->json( new UserResource($user), 201);
        }
    }

    

}
