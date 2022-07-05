<?php

namespace App\Services;

use App\Models\Underpass;
use Illuminate\Database\Eloquent\Collection;

class UnderpassService
{
    public function all(): Collection
    {
        return Underpass::with('stations')->get();
    }

    public function create(array $data): Underpass
    {
        return Underpass::create($data);
    }

    public function update(array $newData, Underpass $underpass): bool
    {
        return $underpass->update($newData);
    }

    public function delete(Underpass $underpass): bool|null
    {
        return $underpass->deleteOrFail();
    }
}
