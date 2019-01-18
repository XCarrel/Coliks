<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    public function customers()
    {
        return $this->hasMany('App\Customers');
    }
}
