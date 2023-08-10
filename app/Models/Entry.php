<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function childResident()
    {
        return $this->belongsTo(ChildResident::class, 'child_resident_id');
    }
}
