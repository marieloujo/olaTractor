<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'age',  'email', 'password', 'sexe', 'telephone', 'role',
        'certificat_nationalite', 'acte_naissance', 'carte_identite', 'id_localite'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'password', 'remember_token', 'age',  'email', 
        'lieu_naissance', 'sexe', 'telephone', 'certificat_nationalite', 'acte_naissance', 
        'carte_identite', 'email_verified_at', 'role'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }
    


    public function localite()
    {
        return $this->belongsTo('App\Modeles\Localite', 'id_localite');
    }



    public function tracteurs_add()
    {
        return $this->belongsTo('App\Modeles\Tracteur');
    }


    public function tracteurs_louer()
    {
        return $this->belongsToMany('App\Modeles\Tracteur', 'louer', 'utilisateur_id', 'tracteur_id')
                    ->withPivot('id', 'is_paie', 'is_valid' , 'date_emprunt', 'date_retour');
    }


}
