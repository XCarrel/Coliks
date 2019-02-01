<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Cities;
class Customers extends Model
{
    public $timestamps = false;

    public function contracts()
    {
        return $this->hasMany('App\Contracts');
    }
    public function purchases()
    {
        return $this->hasMany('App\Purchases');
    }
    public function cities()
    {
        return $this->belongsTo('App\Cities');
    }
}