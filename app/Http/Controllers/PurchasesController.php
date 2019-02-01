<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customers;
use App\Cities;
use App\Purchases;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use View;


class PurchasesController extends Controller
{

    static public function DB()
    {
        $purchases =  Purchases::all();

        return view('Purchases')->with('purchases',$purchases);
    }

    public function read($idpurch)
    {
        $purchase = Purchases::find($idpurch);
        return View::make('Purchases', [
            'purchase' => $purchase,


        ]);
    }
}