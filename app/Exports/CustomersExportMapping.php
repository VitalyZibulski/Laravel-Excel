<?php

namespace App\Exports;

use App\Customer;
use App\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExportMapping implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::with('customer')->get();
    }


    /**
     * @param mixed $purchase
     * @return array
     */
    public function map($purchase): array
    {
        return [
          $purchase->id,
          $purchase->customer->first_name . ' ' . $purchase->customer->last_name,
          $purchase->account_number,
          $purchase->created_at->toDateString(),
          $purchase->created_at->toDateString()
        ];
    }
}
