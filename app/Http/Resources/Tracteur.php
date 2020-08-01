<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\User as UserResource;
use App\User;


class Tracteur extends JsonResource
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
            'modele' => $this->modele,
            'marque' => $this->marque,
            'type' => $this->type,
            'proprietaire' => new UserResource($this->users_add),
            'locataires' => UserResource::Collection($this->users_louer) 
        ];
    }
}
