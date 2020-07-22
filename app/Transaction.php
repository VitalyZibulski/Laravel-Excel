<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['customer_id', 'amount'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
