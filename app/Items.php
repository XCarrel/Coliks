<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Categories;

class Items extends Model
{
    public function renteditems()
    {
        return $this->hasMany('App\Renteditems', 'item_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }
}
