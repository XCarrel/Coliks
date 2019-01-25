<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = ['name'];

    public function customers()
    {
        return $this->hasMany('App\Customers');
    }
}
