<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExportDateFormat implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }

    /**
     * @param Customer $customer
     * @return array
     */
    public function map($customer): array
    {
        return [
          $customer->id,
          $customer->first_name,
          $customer->last_name,
          $customer->email,
          $customer->created_at->format('d/m/Y H:i:s'),
          $customer->first_name->format('d/m/Y H:i:s')
        ];
    }
}
