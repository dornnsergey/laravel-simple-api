<?php

namespace App\Services;

use App\Http\Requests\StoreUnderpassRequest;
use App\Http\Requests\UpdateUnderpassRequest;
use App\Models\Underpass;

class UnderpassService
{
    public function all()
    {
        return Underpass::with('stations')->get();
    }

    public function create(StoreUnderpassRequest $request)
    {
        return Underpass::create($request->validated());
    }

    public function update(UpdateUnderpassRequest $request, Underpass $underpass)
    {
        return $underpass->update($request->validated());
    }

    public function delete(Underpass $underpass)
    {
        $underpass->deleteOrFail();
    }
}
