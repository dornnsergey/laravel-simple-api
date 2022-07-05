<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Station\StationRequest;
use App\Http\Resources\StationResource;
use App\Models\Station;
use App\Services\StationService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class StationController extends Controller
{
    public function __construct(private StationService $stationService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return StationResource::collection($this->stationService->all());
    }

    public function store(StationRequest $request): StationResource
    {
        $station = $this->stationService->create($request->validated());

        return new StationResource($station);
    }

    public function show(Station $station): StationResource
    {
        return new StationResource($station->load(['line', 'previous', 'next', 'underpass']));
    }

    public function update(StationRequest $request, Station $station): StationResource
    {
        $this->stationService->update($request->validated(), $station);

        return new StationResource($station);
    }

    public function destroy(Station $station): Response
    {
        $this->stationService->delete($station);

        return response()->noContent();
    }
}
