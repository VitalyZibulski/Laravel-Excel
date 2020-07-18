<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomersExportSize implements FromCollection, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
          AfterSheet::class => function(AfterSheet $event) {
            $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);

            $event->sheet->getDelegate()->getStyle('A1:D4')
                ->getAlignment()->setWrapText(true);
          }
        ];
    }
}
