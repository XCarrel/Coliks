<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Items extends Model
{
    public function renteditems()
    {
        return $this->hasMany('App\Renteditems');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories','category_id');
    }

}
