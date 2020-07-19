<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersImportHeading implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'email' => $row['email'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name']
        ]);
    }

    public function headingRow(): int
    {
        return 1; // row for header
    }
}
