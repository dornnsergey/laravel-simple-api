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
            'line' => $this->line_id,
            'previous station' => $this->previous,
            'next station' => $this->next,
            'underpass' => $this->whenNotNull($this->underpass_id)
        ];
    }
}
