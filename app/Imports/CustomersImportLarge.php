<?php

namespace App\Imports;

use App\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CustomersImportLarge implements ToModel, WithBatchInserts, WithChunkReading, ShouldQueue //QUEUE_CONNECTION=database, php artisan queue:work
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'first_name' => $row[1],
            'last_name' => $row[2],
            'email' => $row[3]
        ]);
    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}
