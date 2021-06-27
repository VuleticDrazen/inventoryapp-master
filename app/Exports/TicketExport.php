<?php


namespace App\Exports;


use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketExport implements FromCollection
{
    public function collection()
    {
        return Ticket::all();
    }
}
