<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Underpass extends Model
{
    use HasFactory;

    protected $fillable = [
        'column'
    ];

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
