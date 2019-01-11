<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Categories extends Model
{
    public function items()
    {
        return $this->hasMany('app\Items');
    }
    public function renteditems()
    {
        return $this->hasMany('app\Renteditems');
    }
}