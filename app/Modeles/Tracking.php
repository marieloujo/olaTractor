<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{


    protected $table = 'tracking';


    protected $fillable = [
        'tracteur_id' , 'longitude', 'latitude', 'date', 'time'
    ];

    
    public function tracteur()
    {
        return $this->belongsTo('App\Tracteurs');
    }

}
