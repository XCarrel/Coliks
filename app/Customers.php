<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cities;

class Customers extends Model
{
    public $timestamps = false;

    public function contracts()
    {
        return $this->hasMany('app\Contracts');
    }

    public function purchases()
    {
        return $this->hasMany('app\Purchases');
    }

    public function cities()
    {
        return $this->belongsTo('app\Cities');
    }
}
