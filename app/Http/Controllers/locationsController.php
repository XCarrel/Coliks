<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Customers;
use App\Contracts;
use App\Cities;

class locationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customers::all();
        $cities = Cities::all();

        
        $name = $request->all();


        return view('locations')->with('name', $name);
    }

    public function autocomplete_lastname(Request $request){

        //Get the firstname values
        $data = Customers::select("lastname")
        ->where("lastname","LIKE","%{$request->input('query')}%")
        ->get();

        
        //Get the values wihtout the column name
        $last_names=[];
        foreach($data as $item){
            array_push($last_names, $item->lastname);
        }   
        
        
        //Return the data as JSON
        return response()->json($last_names);
    }

    public function autocomplete_firstname(Request $request){


        //Get the firstname values
        $data = Customers::select("firstname")
        ->where("firstname","LIKE","%{$request->input('query')}%")
        ->get();

        
        //Get the values wihtout the column name
        $first_names=[];
        foreach($data as $item){
            array_push($first_names, $item->firstname);
        }   
        
        
        //Return the data as JSON
        return response()->json($first_names);
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
