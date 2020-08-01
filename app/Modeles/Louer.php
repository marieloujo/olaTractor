<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

class Louer extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'louer';


    protected $fillable = [
        'utilisateur_id' , 'tracteur_id', 'is_paie'
    ];

}
