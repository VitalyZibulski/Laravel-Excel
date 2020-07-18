<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['customer_id', 'account_number', 'company'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
