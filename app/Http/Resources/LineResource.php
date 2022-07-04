<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LineResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'color' => $this->color,
            'length' => $this->length,
            'stations' => StationResource::collection($this->stations)
        ];
    }
}
