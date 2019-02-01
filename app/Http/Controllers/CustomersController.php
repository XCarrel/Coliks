<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customers;
use App\Cities;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use View;


class CustomersController extends Controller
{
    static public function DB()
    {
        $customers =  Customers::all();
        $cities = Cities::all();
        return view('Customers')->with('customers',$customers)->with('cities',$cities);
    }
    public function create(request $request)
    {
        $customer = new Customers();
        try
        {
            $customer->lastname =  $request->input('lastname_input');
            $customer->firstname = $request->input('firstname_input');
            $customer->address = $request->input('address_input');
            $customer->city_id = $request->input('city_id_input');
            $customer->phone = $request->input('phone_input');
            $customer->email = $request->input('email_input');
            $customer->mobile = $request->input('mobile_input');
            $customer->save();
            Session::flash('status', 'the object have been created');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'An error appear, please fill all the fields');
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }

    public function read($idcust)
    {
        $customer = Customers::find($idcust);
        $cities = Cities::All();
        return View::make('Show', [
            'customer' => $customer,

            'cities' =>$cities
        ]);
    }

    public function update(request $request)
    {
        $customer = Customers::find($request->input('idcust'));
        try
        {
            $customer->lastname =  $request->input('lastname_input');
            $customer->firstname = $request->input('firstname_input');
            $customer->address = $request->input('address_input');

            $customer->phone = $request->input('phone_input');
            $customer->email = $request->input('email_input');
            $customer->mobile = $request->input('mobile_input');
            $customer->save();
            Session::flash('status', 'the object have been updated');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status','An error appear: '.$ex->getMessage() );
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }



    public function delete($idcust)
    {

        $customer = Customers::find($idcust);
        try
        {
            $customer->delete();
            Session::flash('status', 'l\'objet has been deleted.');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'An error appear');
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }
}