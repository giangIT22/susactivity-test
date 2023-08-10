<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
