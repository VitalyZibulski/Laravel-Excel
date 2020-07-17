<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExportHeading implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $customers = Customer::all();

        $final_collection = [];
        foreach ($customers->chunk(3) as $chunk) {
            $final_collection = array_merge($final_collection, $chunk->toArray(), [[]]);
        }

        return collect($final_collection);
    }

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
}
