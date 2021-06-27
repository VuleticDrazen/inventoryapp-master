<?php


namespace App\Exports;


use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketInProgressExport implements FromCollection
{
    public function collection()
    {
        return Ticket::query()->where('status_id','=', '2')->get();
    }
}
