<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Durations;
use Categories;
use Items;
use Contracts;

class Renteditems extends Model
{
    protected $table = 'renteditems';
    public function durations()
    {
        return $this->belongsTo('App\Durations');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }

    public function items()
    {
        return $this->belongsTo('App\Items');
    }

    public function contracts()
    {
        return $this->belongsTo('App\Contracts');
    }


}
