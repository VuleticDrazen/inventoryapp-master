<?php


namespace App\Exports;


use App\Models\Equipment;

class EquipmentExport
{
    public function collection()
    {
        return Equipment::all();
    }
}
