<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Items extends Model
{
    protected $table = 'items';
    //protected $fillable = ['brand','model','size','cost','return','type','stock','serialnumber'];
    public $timestamps = false;

    public function renteditems()
    {
        return $this->hasMany('App\Renteditems');
    }
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

}
