<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Customers;

class Purchases extends Model
{
    public function customers()
    {
        return $this->belongsTo('App\Customers');
    }
}
