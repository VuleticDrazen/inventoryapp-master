<?php


namespace App\Exports;


use App\Models\Equipment;
use Maatwebsite\Excel\Concerns\FromCollection;

class EquipmentExport implements FromCollection
{
    public function collection()
    {
        return Equipment::all();
    }
}
