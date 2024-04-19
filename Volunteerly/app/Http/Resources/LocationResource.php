<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'province' => $this->province,
            'street' => $this->street,
            'coordinates' => $this->coordinates,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
