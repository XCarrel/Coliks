<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class inventoryController extends Controller
{
    static public function  testoBD(){
        try{
            DB::connection()->getPdo();
        }
        catch (\Exception $e){
            die("gnfjdgnfjdngij". $e);
        }
    }
}
