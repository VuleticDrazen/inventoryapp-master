<?php


namespace App\Exports;


use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class TicketExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    public function collection()
    {
        return Ticket::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'Request type',
            'Ticket type',
            'Subject',
            'Description',
            'Quantity',
            'Status',
            'User',
            'Admin in Charge',
            'Costs',
            'Created at',
            'Expected delivery date',
            'Delivered at'
        ];
    }

    public function map($row): array
    {

        return[
            $row->id,
            $row->ticket_request_type,
            $row->ticket_type,
            $row->subject,
            $row->description,
            $row->quantity,
            $row->status->name,
            $row->user->name,
            $row->officer->name,
            $row->costs,
            $row->created_at,
            $row->expected_delivery_date,
            $row->delivered_at

        ];

    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:M1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}
