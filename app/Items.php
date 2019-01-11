<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Categories;
class Items extends Model
{
    public function renteditems()
    {
        return $this->hasMany('app\Renteditems');
    }
    public function categories()
    {
        return $this->belongsTo('app\Categories');
    }
}