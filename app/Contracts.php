<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Staffs;
use Customers;
class Contracts extends Model
{

    public function customers()
    {
        return $this->belongsTo('app\Customers');
    }
    public function help_staff()
    {
        return $this->belongsTo('app\Staffs', 'help_staff');
    }
    public function tune_staff()
    {
        return $this->belongsTo('app\Staffs', 'tune_staff');
    }
    public function renteditems()
    {
        return $this->hasMany('app\Renteditems');
    }
}