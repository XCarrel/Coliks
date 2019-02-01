<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'description',
    ];
    public function items()
    {
        return $this->hasMany('App\Items', 'category_id');
    }

    public function renteditems()
    {
        return $this->hasMany('App\Renteditems', 'category_id');
    }
}
