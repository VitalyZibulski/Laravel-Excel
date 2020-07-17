<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomersOrganiztionSheet implements FromCollection, WithTitle
{
    private $organization;

    public function __construct($organization)
    {
        $this->organization = $organization;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::where('email', 'like', '%' . $this->organization)->get();
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Organization ' . $this->organization;
    }
}
