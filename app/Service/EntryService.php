<?php

namespace App\Service;

use App\Models\Entry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;

class EntryService implements EntryServiceInteface
{
    public function getAll($params)
    {
        $buildingName = isset($params['building_name']) ? $params['building_name'] : null;
        $roomNumber = isset($params['room_number']) ? $params['room_number'] : null;
        $lastName = isset($params['last_name']) ? $params['last_name'] : null;
        $firstName = isset($params['first_name']) ? $params['first_name'] : null;

        if ($buildingName || $roomNumber || $lastName || $firstName) {
            $entries = Entry::with(['room', 'building', 'resident', 'childResident'])
                ->whereHas('building', function (Builder $query) use ($buildingName) {
                    $query->where('buildingNameJapanese', 'like', '%' . $buildingName . '%');
                })
                ->WhereHas('room', function (Builder $query) use ($roomNumber) {
                    $query->where('room_number', $roomNumber);
                })
                ->Where('representative_lastname', 'like', '%' . $lastName . '%')
                ->Where('representative_firstname', 'like', '%' . $firstName . '%')
                ->get();
        } else {
            $entries = Entry::with(['room', 'building', 'resident', 'childResident'])->get();
        }

        return [
            'total' => $entries->count(),
            'entries' => $entries->take(100),
        ];
    }

    public function find($id)
    {
        $entry = Entry::with(['room', 'building', 'resident', 'childResident'])
            ->findOrFail($id);

        return $entry;
    }

    public function downloadCsv($params)
    {
        $filename = 'data.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $data = $this->getAll($params);
        $headerColumn = [[
            'エントリー
            No.',
            '最終更新日時',
            '物件',
            '部屋番号',
            '状況',
            'エントリー
            氏名（姓）',
            'エントリー
            氏名（名）',
            '生年月日',
            '居住人数'
        ]];
        $csvData = $data['entries']->map(function ($entry) {
            return [
                $entry->id,
                $entry->updated_at->format('Y-m-d H:i'),
                $entry->building->buildingNameJapanese,
                $entry->room->room_number,
                '空き',
                $entry->representative_lastname,
                $entry->representative_firstname,
                Carbon::parse($entry->representative_birthdate)->format('Y.m.d'),
                $entry->resident->residents_count
            ];
        })->toArray();

        $csvData = array_merge($headerColumn, $csvData);

        $output = fopen('php://output', 'w');
        foreach ($csvData as $row) {
            fputcsv($output, $row);
        }
        fclose($output);

        return Response::stream(
            function () use ($output) {
                fclose($output);
            },
            200,
            $headers
        );
    }
}
