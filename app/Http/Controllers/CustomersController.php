<?php
namespace App\Http\Controllers;
use Request;
use DB;
use App\Cities;
use App\Customers;
use View;
use App\Items;
use Illuminate\Support\Facades\Input;

class CustomersController extends Controller
{
    static public function testDB()
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
            $customer->lastname =  $request->input('lastname');
            $customer->firstname = $request->input('firstname');
            $customer->address = $request->input('address');
            $customer->city_id = $request->input('city_id');
            $customer->phone = $request->input('phone');
            $customer->email = $request->input('email');
            $customer->mobile = $request->input('mobile');
            $customer->save();
            Session::flash('status', 'l\'objet à bien été crée.');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'Une erreur est intervenue : veuillez remplir tous les champs svp');
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }

    public function read($idcust)
    {
        $customer = Customers::find($idcust);
        return View::make('Show', [
            'customer' => $customer
        ]);
    }

    private function update(Request $request)
    {
        $customer = Items::find($request->input('iditem'));
        try
        {
            $customer->lastname =  $request->input('lastname_input');
            $customer->firstname = $request->input('firstname_input');
            $customer->address = $request->input('address_input');
            $customer->city_id = $request->input('city_input');
            $customer->phone = $request->input('phone_input');
            $customer->email = $request->input('email_input');
            $customer->mobile = $request->input('mobile_input');
            $customer->save();
            Session::flash('status', 'L\'objet à bien été modifié.');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status','Une erreur est intervenue : '.$ex->getMessage() );
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }



    private function delete(request $request)
    {
        $customer = Customers::find($request->input('id'));
        try
        {
            $customer->delete();
            Session::flash('status', 'l\'objet à bien été supprimé.');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'Une erreur est intervenue');
            Session::flash('class', 'alert-danger');
        }
        return redirect('Customers');
    }
}