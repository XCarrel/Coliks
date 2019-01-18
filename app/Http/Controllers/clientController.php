<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Cities;
use DB;

class clientController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customers::all();
        $cities = Cities::all();

        $name = $request->all();
        return view('client')->with('name', $name);
    }
    /*
    static public function  testoBD(){
        try{
            DB::connection()->getPdo();
        }
        catch (\Exception $e){
            die("gnfjdgnfjdngij". $e);
        }
    }*/
}
