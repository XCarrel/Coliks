<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Geartypes;
use Durations;
use Categories;

class Rentprices extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'price',
    ];
    public function geartypes()
    {
        return $this->belongsTo('App\Geartypes', 'geartype_id');
    }

    public function durations()
    {
        return $this->belongsTo('App\Durations', 'duration_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
