<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Cities extends Model
{
    protected $table = 'cities';

    public function customers()
    {
        return $this->hasMany('app\Customers');
    }
}