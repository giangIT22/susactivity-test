<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
