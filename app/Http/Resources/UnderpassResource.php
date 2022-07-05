<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnderpassResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'column' => $this->column,
            'stations' => StationResource::collection($this->when($this->stations->isNotEmpty(), $this->whenLoaded('stations')))
        ];
    }
}
