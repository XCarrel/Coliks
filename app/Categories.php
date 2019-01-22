<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function items()
    {
        return $this->hasMany('App\Items');
    }

    public function renteditems()
    {
        return $this->hasMany('App\Renteditems');
    }
}
