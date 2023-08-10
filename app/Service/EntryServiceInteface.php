<?php

namespace App\Service;

interface EntryServiceInteface
{
    public function getAll($params);
    public function find($id);
    public function downloadCsv($params);
}
