<?php

namespace App\Exports;

use App\Models\store;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromArray;

class StoresExport implements FromArray,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($data=array()) {

        $this->data=$data;

      }

      public function array(): array
    {
        return $this->data;
        return $dataArray;
    }
    public function collection()
    {

    }
    public function headings(): array
    {
        return [
            '#',
            'Network',
            'Store Name',
            'Category',
            'Country',
            'Offers',
            'Status',

        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:G1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            },
        ];
    }
}
