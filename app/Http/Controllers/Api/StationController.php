<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Http\Resources\StationResource;
use App\Models\Station;
use App\Services\StationService;


class StationController extends Controller
{
    public function __construct(private StationService $stationService)
    {
    }

    public function index()
    {
        return StationResource::collection($this->stationService->all());
    }

    public function store(StoreStationRequest $request)
    {
        $station = $this->stationService->create($request);

        return new StationResource($station);
    }

    public function show(Station $station)
    {
        return new StationResource($station);
    }

    public function update(UpdateStationRequest $request, Station $station)
    {
        $this->stationService->update($request, $station);

        return new StationResource($station);
    }

    public function destroy(Station $station)
    {
        $this->stationService->delete($station);

        return response()->noContent();
    }
}
