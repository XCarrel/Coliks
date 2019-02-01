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
        $customers =  Customers::all();

        return view('Purchases')->with('purchases',$purchases)->with('customers',$customers);
    }


    public function create(request $request)
    {

        $purchase = new Purchases();
        try
        {
            $purchase->date = $request->input('date_input');
            $purchase->description = $request->input('description_input');
            $purchase->amount = $request->input('amount_input');

            $purchase->save();
            Session::flash('status', 'the gift has been created');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'An error appear, please fill all the fields');
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }


    public function read($idpurch)
    {
        $purchases = Purchases::all();
        $purchase = Purchases::find($idpurch);
        $customers = Customers::All();

        return view('Purchases')->with('purchases',$purchases)->with('customers',$customers)->with('purchase',$purchase);
    }
}