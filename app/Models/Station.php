<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'line_id',
        'previous',
        'next',
        'underpass_id'
    ];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function underpass()
    {
        return $this->belongsTo(Underpass::class);
    }
}
