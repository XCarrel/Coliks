<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Client
 *

 */
class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'last_name', 'first_name','address','city_id','phone', 'email','mobile' ];

    public static function boot()
    {
        parent::boot();
    }

    /**
     * Set to null if empty
     * @param $input
     */


}