<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Categories;

class Items extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'itemnb',
        'brand',
        'model',
        'size',
        'category_id',
        'cost',
        'return',
        'type',
        'stock',
        'serialnumber',

    ];
    public function renteditems()
    {
        return $this->hasMany('App\Renteditems', 'item_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
