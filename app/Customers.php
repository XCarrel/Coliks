<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'lastname',
        'firstname',
        'address',
        'city_id',
        'phone',
        'email',
        'mobile',
    ];

    public function contracts()
    {
        return $this->hasMany('App\Contracts','customer_id');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchases', 'customer_id');
    }

    public function cities()
    {
        return $this->belongsTo('App\Cities', 'city_id');
    }
}
