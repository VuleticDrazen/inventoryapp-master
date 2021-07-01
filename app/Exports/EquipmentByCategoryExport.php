<?php

namespace App\Exports;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class EquipmentByCategoryExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{

    private $request;

    public function __construct(Request $request = null)
    {

        $this->request = $request;
    }


    public function collection()
{
    return (collect(Equipment::getEquipment($this->request)));

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
