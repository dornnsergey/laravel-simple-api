<?php

namespace App\Services;


use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;


class StationService
{
    public function all()
    {
        return Station::with(['line', 'underpass'])->get();
    }

    public function create(StoreStationRequest $request)
    {
        return Station::create($request->validated());
    }

    public function update(UpdateStationRequest $request, Station $station)
    {
        return $station->update($request->validated());
    }

    public function delete(Station $station)
    {
        $station->deleteOrFail();
    }
}
