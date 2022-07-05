<?php

namespace App\Services;

use App\Models\Station;
use Illuminate\Database\Eloquent\Collection;


class StationService
{
    public function all(): Collection
    {
        return Station::with(['line', 'underpass', 'previous', 'next'])->get();
    }

    public function create(array $data): Station
    {
        return Station::create($data);
    }

    public function update(array $newData, Station $station): bool
    {
        return $station->update($newData);
    }

    public function delete(Station $station): bool|null
    {
       return $station->deleteOrFail();
    }
}
