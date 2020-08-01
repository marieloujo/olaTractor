<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Louer extends JsonResource
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
            'is_paie' => $this->is_paie,
            'is_valid' => $this->is_valid
        ];
    }
}
