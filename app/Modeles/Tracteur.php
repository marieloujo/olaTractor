<?php

namespace App\Modeles;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Tracteur extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'marque', 'modele'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'tracking'
    ];



    public function tracteur()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function users_louer()
    {
        return $this->belongsToMany('App\User', 'louer', 'tracteur_id', 'utilisateur_id')
                    ->withPivot('id', 'is_paie', 'is_valid');
    }


    public function tracking()
    {
        return $this->hasMany('App\Modeles\Tracking', 'tracteur_id');
    }


}
