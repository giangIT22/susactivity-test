<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\EntryServiceInteface;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    protected $entryService;
    
    public function __construct(EntryServiceInteface $entryService)
    {
       $this->entryService = $entryService;    
    }

    public function getAll()
    {
        // dd($this->entryService->getAll());

        return view('admin.member.index', $this->entryService->getAll());
    }
}
