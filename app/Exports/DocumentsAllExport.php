<?php

namespace App\Exports;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DocumentsAllExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

        public function collection()
    {
        return collect(Document::all());
    }

    public function headings(): array
    {
        return [
            '#',
            'User',
            'Admin in charge',
            'Created at',
            'Updated at',

        ];
    }

    public function map($row): array
    {
        return[
            $row->id,
            $row->user->name,
            $row->admin->name,
            $row->created_at,
            $row->updated_at,

        ];

    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}
