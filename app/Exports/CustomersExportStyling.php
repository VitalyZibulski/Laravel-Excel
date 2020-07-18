<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomersExportStyling implements FromCollection, WithHeadings, WithEvents
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
          'First Name',
          'Last Name',
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
            $cellRange = 'A1:W1'; // All headers
            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            $styleArray = [
              'borders' => [
                  'outline' => [
                      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                      'color' => ['argb' => 'FFFF0000'],
                  ]
              ]
            ];

            $event->sheet->getDelegate()->getStyle('B2:G8')->applyFromArray($styleArray);
          }
        ];
    }
}
