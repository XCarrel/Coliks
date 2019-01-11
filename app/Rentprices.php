<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Geartypes;
use Durations;
use Categories;

class Rentprices extends Model
{
    public function geartypes()
    {
        return $this->belongsTo('app\Geartypes');
    }

    public function durations()
    {
        return $this->belongsTo('app\Durations');
    }

    public function categories()
    {
        return $this->belongsTo('app\Categories');
    }
}
