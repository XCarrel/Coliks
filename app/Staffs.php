<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    public function help_staff()
    {
        return $this->hasMany('App\Staffs', 'help_staff');
    }

    public function tune_staff()
    {
        return $this->hasMany('App\Staffs', 'tune_staff');
    }
}
