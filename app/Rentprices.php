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
        return $this->belongsTo('App\Geartypes');
    }

    public function durations()
    {
        return $this->belongsTo('App\Durations');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }
}
