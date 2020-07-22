<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomersExportMergeCells implements FromCollection, WithHeadings, WithEvents
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
    public function headings(): array
    {
        return [
          '#',
          'Name',
          '',
          'Email',
          'Created at',
          'Updated at'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
          AfterSheet::class => function(AfterSheet $event) {
            $event->sheet->getDelegate()->mergeCells('B1:C1');
            $event->sheet->getDelegate()->getStyle('B1')
                ->getAlignment()->setHorizontal('center');
          }
        ];
    }
}
