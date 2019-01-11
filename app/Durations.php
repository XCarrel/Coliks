<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Durations extends Model
{
    public function rentprices()
    {
        return $this->hasMany('app\Rentprices');
    }
    public function renteditems()
    {
        return $this->hasMany('app\Renteditems');
    }
}