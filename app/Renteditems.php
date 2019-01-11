<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Durations;
use Categories;
use Items;
use Contracts;
class Renteditems extends Model
{
    public function durations()
    {
        return $this->belongsTo('app\Durations');
    }
    public function categories()
    {
        return $this->belongsTo('app\Categories');
    }
    public function items()
    {
        return $this->belongsTo('app\Items');
    }
    public function contracts()
    {
        return $this->belongsTo('app\Contracts');
    }

}