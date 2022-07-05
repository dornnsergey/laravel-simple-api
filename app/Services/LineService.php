<?php

namespace App\Services;

use App\Models\Line;
use Illuminate\Database\Eloquent\Collection;


class LineService
{
    public function all(): Collection
    {
        return Line::with('stations')->get();
    }

    public function create(array $data): Line
    {
        return Line::create($data);
    }

    public function update(array $newData, Line $line): bool
    {
        return $line->update($newData);
    }

    public function delete(Line $line): bool|null
    {
        return $line->deleteOrFail();
    }
}
