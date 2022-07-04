<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnderpassRequest;
use App\Http\Requests\UpdateUnderpassRequest;
use App\Http\Resources\UnderpassResource;
use App\Models\Underpass;
use App\Services\UnderpassService;


class UnderpassController extends Controller
{
    public function __construct(private UnderpassService $underpassService)
    {
    }

    public function index()
    {
        return UnderpassResource::collection($this->underpassService->all());
    }

    public function store(StoreUnderpassRequest $request)
    {
        $underpass = $this->underpassService->create($request);

        return new UnderpassResource($underpass);
    }

    public function show(Underpass $underpass)
    {
        return new UnderpassResource($underpass);
    }

    public function update(UpdateUnderpassRequest $request, Underpass $underpass)
    {
        $this->underpassService->update($request, $underpass);

        return new UnderpassResource($underpass);
    }

    public function destroy(Underpass $underpass)
    {
        $this->underpassService->delete($underpass);

        return response()->noContent();
    }
}
