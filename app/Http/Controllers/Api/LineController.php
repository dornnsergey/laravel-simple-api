<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Line\LineRequest;
use App\Http\Resources\LineResource;
use App\Models\Line;
use App\Services\LineService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class LineController extends Controller
{
    public function __construct(private LineService $lineService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return LineResource::collection($this->lineService->all());
    }

    public function store(LineRequest $request): LineResource
    {
        $line = $this->lineService->create($request->validated());

        return new LineResource($line);
    }

    public function show(Line $line): LineResource
    {
        return new LineResource($line);
    }

    public function update(LineRequest $request, Line $line): LineResource
    {
        $this->lineService->update($request->validated(), $line);

        return new LineResource($line);
    }

    public function destroy(Line $line): Response
    {
        $this->lineService->delete($line);

        return response()->noContent();
    }
}
