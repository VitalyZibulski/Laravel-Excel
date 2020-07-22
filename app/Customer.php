<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'created_at', 'updated_at'];

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
