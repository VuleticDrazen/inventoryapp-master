<?php


namespace App\Exports;


use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class TicketInProgressExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    public function collection()
    {
        return Ticket::query()->where('status_id','=', '2')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Category',
            'Equipment name',
            'Available quantity',
            'Description',

        ];
    }

    public function map($row): array
    {
        return[
            $row->id,
            $row->category->name,
            $row->name,
            $row->available_quantity,
            $row->description,

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
