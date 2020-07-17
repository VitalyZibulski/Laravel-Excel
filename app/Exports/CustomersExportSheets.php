<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CustomersExportSheets implements WithMultipleSheets
{
    use Exportable;


    public function sheets(): array
    {
        $sheets = [];

        $organizations = ['example.net', 'example.com', 'example.org'];

        foreach ($organizations as $organization) {
            $sheets[] = new CustomersOrganiztionSheet($organization);
        }

        return $sheets;
    }
}
