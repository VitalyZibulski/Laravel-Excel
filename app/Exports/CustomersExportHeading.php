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
        return Customer::select(\DB::raw("'', id, first_name, last_name, email, created_at, updated_at"))->get();
    }

    public function headings(): array
    {
        return [
          ' ',
          '#',
          'First Name',
          'Last Name',
          'Email',
          'Created at',
          'Updated at'
        ];
    }
}
