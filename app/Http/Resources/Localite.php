<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Localite extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'localites_environnantes' => $this->localites_environnantes,
            'localites_environner' => $this->localites_environner
        ];
    }
}
