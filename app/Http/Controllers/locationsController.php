<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Customers;
use App\Cities;
use App\Contracts;
use App\Purchases;

class locationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contract');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCities(){

        // Get all records from table Cities
        $citiesName = Cities::all();
        
        return view('locations')->with('cities', $citiesName);
    }

    public function showForm(Request $request)
    {

        // Get POST value from ajax
        $nom = $request->all();

        // SQL request
        $users = Customers::with('contracts', 'cities', 'purchases')->where("lastname", $nom)->get();

        // Check if multiple records
        if ($users->count() > 1) {

            // Return error message
            \Session::flash('flash_message','Il y a plusieurs noms de famille, veuillez en choisir un');
            
            // Return values as JSON
            return response()->json([
                'success' => 'firstname',
                'value'   => $users,
                'flash_message' => 'Il y a plusieurs noms de famille, veuillez en choisir un'
            ]);
            // Return the message to view
            return View::make('flash-messages');

        }
        else{
            // Return values as JSON
            return response()->json(['value' => $users]); 

        }
        
        
    }
    /**
     * Performs autocomplete on column lastname.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete_lastname(Request $request){


        //Get the firstname values
        $data = Customers::with('contracts', 'cities', 'purchases')->where("lastname", "LIKE", "%{$request->input('query')}%")->get();

        
        //Get the values wihtout the column name
        $last_names=[];
        foreach($data as $item){
            array_push($last_names, $item->lastname);
        }   
        
        
        //Return the data as JSON
        return response()->json($last_names);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomer(Request $request)
    {

        /*$request->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'address'=>'required',
          ]);*/

        $customer = new Customers;

        // Get all the values from the form and tells which column for the value to the model Customers
        $customer->lastname = $request->lastname;
        $customer->address= $request->address;
        $customer->firstname= $request->firstname;
        $customer->phone= $request->phone;
        $customer->city_id = $request->city_id;
        $customer->mobile= $request->mobile;
        $customer->email= $request->email;

        dd($customer);

        // Update
        $customer->save();

        // Return error message
        \Session::flash('success','Vous avez bien ajouté le client !');

        // Return values as JSON
        return response()->json([
            'success' => 'Vous avez bien ajouté le client !'
        ]);
        
        // Return the message to view
        return View::make('success');
          
                     
          
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Request that update Customer table
        $customer = Customers::findOrFail($request->id);
        
        //Assign values from form to databases columns
        $customer->lastname = $request->lastname;
        $customer->address= $request->address;
        $customer->firstname= $request->firstname;
        $customer->phone= $request->phone;
        $customer->city_id = $request->city_id;
        $customer->mobile= $request->mobile;
        $customer->email= $request->email;

        // Update
        $customer->save();

        // Return error message
        \Session::flash('success','Vous avez bien modifié le client');

        // Return values as JSON
        return response()->json([
            'success' => 'Vous avez bien modifié le client'
        ]);
        
        // Return the message to view
        return View::make('success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
