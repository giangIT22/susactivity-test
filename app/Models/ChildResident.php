<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildResident extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function entries()
    {
        return $this->hasMany(Entry::class, 'child_resident_id');
    }
}
