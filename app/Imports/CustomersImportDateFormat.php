<?php

namespace App\Imports;

use App\Customer;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImportDateFormat implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'first_name'=> $row[1],
            'last_name' => $row[2],
            'email' => $row[3],
            'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', $row[4]->toDateTimeString()),
            'updated_at' => Carbon::createFromFormat('d/m/Y H:i:s', $row[5]->toDateTimeString())
        ]);
    }
}
