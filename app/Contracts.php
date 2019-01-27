<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Renteditems;

class Contracts extends Model
{
    protected $primaryKey = 'ID_Contrat';
    protected $fillable = [
        'creationdate',
        'effectivereturn',
        'plannedreturn',
        'notes',
        'total',
        'takeon',
        'paidon',
        'insurance',
        'goget',
    ];

    public function customers()
    {
        return $this->belongsTo('App\Customers', 'customer_id');
    }

    public function help_staff()
    {
        return $this->belongsTo('App\Staffs', 'help_staff');
    }

    public function tune_staff()
    {
        return $this->belongsTo('App\Staffs', 'tune_staff');
    }

    public function renteditems()
    {
        return $this->hasMany('App\Renteditems', 'contract_id');
    }

}
