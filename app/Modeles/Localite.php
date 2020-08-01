<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'localites';


    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function localites_environnantes () {

        return $this->belongsToMany('App\Modeles\Localite', 'environner', 'localiteA_id', 'localiteB_id');

    }


    public function localites_environner() {

        return $this->belongsToMany('App\Modeles\Localite', 'environner', 'localiteB_id', 'localiteA_id');

    }


}
