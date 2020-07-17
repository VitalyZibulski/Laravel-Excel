<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];

    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'customer_id', 'id');
    }
}
