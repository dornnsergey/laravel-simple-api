<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Http\Resources\LineResource;
use App\Models\Line;
use App\Services\LineService;


class LineController extends Controller
{
    public function __construct(private LineService $lineService)
    {
    }

    public function index()
    {
        return LineResource::collection($this->lineService->all());
    }

    public function store(StoreLineRequest $request)
    {
        $line = $this->lineService->create($request);

        return new LineResource($line);
    }

    public function show(Line $line)
    {
        return new LineResource($line);
    }

    public function update(UpdateLineRequest $request, Line $line)
    {
        $this->lineService->update($request, $line);

        return new LineResource($line);
    }

    public function destroy(Line $line)
    {
        $this->lineService->delete($line);

        return response()->noContent();
    }
}
