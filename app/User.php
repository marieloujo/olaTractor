<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function localite()
    {
        return $this->belongsTo('App\Modeles\Localite', 'id_localite');
    }



    public function tracteurs_add()
    {
        return $this->belongsTo('App\Tracteurs');
    }


    public function tracteurs_louer()
    {
        return $this->belongsToMany('App\Tracteurs', 'louer', 'utilisateur_id', 'tracteur_id')
                    ->withPivot('id', 'is_paie', 'is_valid' , 'date_emprunt', 'date_retour');
    }


}
