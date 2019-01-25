<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['lastname', 'firstname', 'addresse', 'city_id'];
}
