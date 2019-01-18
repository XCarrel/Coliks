<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Durations extends Model
{
    public function rentprices()
    {
        return $this->hasMany('App\Rentprices');
    }

    public function renteditems()
    {
        return $this->hasMany('App\Renteditems');
    }
}
