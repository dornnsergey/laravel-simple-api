<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'line' => new LineResource($this->whenLoaded('line')),
            'previous station' => new StationResource($this->whenNotNull($this->whenLoaded('previous'))),
            'next station' => new StationResource($this->whenNotNull($this->whenLoaded('next'))),
            'underpass' => new UnderpassResource($this->whenNotNull($this->whenLoaded($this->underpass_id)))
        ];
    }
}
