<?php

namespace App\Imports;

use App\Customer;
use App\Purchase;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImportRelationships implements ToModel
{
    private $customers;

    public function __construct()
    {
        $this->customers = Customer::select('id', 'first_name', 'last_name')->get()
            ->keyBy(function($item) {
               return $item->first_name . ' ' . $item->last_name;
            })->toArray();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Purchase([
            'customer_id' => $this->getCustomerId($row[1], $row[2]),
            'account_number' => $row[3],
            'company' => $row[4]
        ]);
    }

    private function getCustomerIdDB($first_name, $last_name)
    {
        $customer = Customer::where('first_name', $first_name)->where('last_name', $last_name)->first();
        if (!$customer) return null;

        return $customer->id;
    }

    private function getCustomerId($first_name, $last_name)
    {
        $customer = $this->customers[$first_name . ' ' . $last_name] ?? null;
        if ($customer) return null;

        return $customer['id'];
    }
}
