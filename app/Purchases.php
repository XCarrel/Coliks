<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Customers;


class Purchases extends Model
{
    protected $table = 'purchases';
    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
}