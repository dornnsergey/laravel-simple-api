<?php

namespace App\Services;


use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Models\Line;


class LineService
{
    public function all()
    {
        return Line::with('stations')->get();
    }

    public function create(StoreLineRequest $request)
    {
        return Line::create($request->validated());
    }

    public function update(UpdateLineRequest $request, Line $line)
    {
        return $line->update($request->validated());
    }

    public function delete(Line $line)
    {
        $line->deleteOrFail();
    }
}
