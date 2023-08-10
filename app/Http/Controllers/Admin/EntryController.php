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

    //show list member
    public function getAll(Request $request)
    {
        return view('admin.member.index', $this->entryService->getAll($request->all()));
    }

    //Redirect to view edit
    public function findMember($id)
    {
        $entry = $this->entryService->find($id);

        return view('admin.member.edit', compact('entry'));
    }

    //dowload csv
    public function downloadCsv(Request $request)
    {
        $this->entryService->downloadCsv($request->all());
    }
}
