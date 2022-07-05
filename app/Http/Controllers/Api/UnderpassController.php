<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Underpass\UnderpassRequest;
use App\Http\Resources\UnderpassResource;
use App\Models\Underpass;
use App\Services\UnderpassService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class UnderpassController extends Controller
{
    public function __construct(private UnderpassService $underpassService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return UnderpassResource::collection($this->underpassService->all());
    }

    public function store(UnderpassRequest $request): UnderpassResource
    {
        $underpass = $this->underpassService->create($request->validated());

        return new UnderpassResource($underpass);
    }

    public function show(Underpass $underpass): UnderpassResource
    {
        return new UnderpassResource($underpass->load('stations'));
    }

    public function update(UnderpassRequest $request, Underpass $underpass): UnderpassResource
    {
        $this->underpassService->update($request->validated(), $underpass);

        return new UnderpassResource($underpass);
    }

    public function destroy(Underpass $underpass): Response
    {
        $this->underpassService->delete($underpass);

        return response()->noContent();
    }
}
