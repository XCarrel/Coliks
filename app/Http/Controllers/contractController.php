<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Customers;
use App\Cities;
use App\Contracts;
use App\Categories;
use App\Durations;
use App\Geartypes;
use App\Items;
use App\Purchases;
use App\Renteditems;
use App\Rentprices;
use App\Staffs;


class contractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContract(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        // Get POST value from ajax
        $idClient = $request->id;


        //3 where clauses to be sure that's the right data returned (without id)
        $client = Customers::where('id', $idClient)->get();
        //$rentedItems = Contracts::where('customer_id', $idClient)->with('renteditems')->get();
        $items = Items::with('categories')->get();


        // Return values to view 
        return view('contract')->with('client', $client)->with('items', $items);
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
