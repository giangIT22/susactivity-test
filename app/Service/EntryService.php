<?php

namespace App\Service;

use App\Models\Entry;

class EntryService implements EntryServiceInteface
{
    public function getAll()
    {
        $entries = Entry::with(['room', 'building', 'resident', 'childResident'])->get();

        return [
            'total' => $entries->count(),
            'entries' => $entries->take(100)
        ];
    }
}
