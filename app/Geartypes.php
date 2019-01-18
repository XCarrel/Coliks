<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rentprices;

class Geartypes extends Model
{
    public function rentprices()
    {
        return $this->belongsTo('App\Rentprices');
    }
}
