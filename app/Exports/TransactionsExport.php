<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction::all();

        $transactions->push(collect([
            'id' => '',
            'customer_id' => 'Total:',
            'amount' => '=SUM(C1:C' . $transactions->count() . ')',
            'created at' => '',
            'updated at' => ''
        ]));

        return $transactions;
    }
}
