<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Rentprices;
use Illuminate\Http\Request;
use DB;
use App\Categories;
use App\Renteditems;
use App\Items;
use App\Contracts;
use App\Durations;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use View;


class inventoryController extends Controller
{
    static public function getInventory()
    {
        $items =  Items::all();
        $cats = Categories::all();

        return view('inventory')->with('items',$items)->with('cats',$cats);
    }
    public function create(request $request)
    {
        $item = new Items();
        try
        {
                $item->itemnb = $request->input('nb_input');
                $item->brand =  $request->input('brand_input');
                $item->model = $request->input('model_input');
                $item->size = $request->input('size_input');
                $item->category_id = $request->input('category_input');
                $item->cost = $request->input('price_input');
                $item->return = $request->input('return_input');
                $item->type = $request->input('type_input');
                if ($request->input('stock_input') == 'stock')
                    $item->stock = 1;
                else
                    $item->stock = 0;
                $item->serialnumber = $request->input('serial_input');
                $item->save();

                Session::flash('status', 'L\'objet à bien été ajouté à l\'inventaire.');
                Session::flash('class', 'alert-success');


        }
        catch(\Exception $ex)
        {
            Session::flash('status','Une erreur est intervenue : '.$ex->getMessage() );
            Session::flash('class', 'alert-danger');
        }
        return redirect('inventory');
    }
    public function read($iditem)
    {
        $item = Items::find($iditem);
        $cats = Categories::All();
        return View::make('item', [
            'item' => $item,
            'cats' => $cats

        ]);
    }
    public function update(request $request)
    {
        $item = Items::find($request->input('iditem'));

        try
        {
            $item->itemnb = $request->input('nb_input');
            $item->brand =  $request->input('brand_input');
            $item->model = $request->input('model_input');
            $item->size = $request->input('size_input');
            $item->category_id = $request->input('category_input');
            $item->cost = $request->input('cost_input');
            $item->return = $request->input('return_input');
            $item->type = $request->input('type_input');
            if ($request->input('stock_input') == 'stock')
                $item->stock = 1;
            else
                $item->stock = 0;
            $item->serialnumber = $request->input('serial_input');
            $item->save();

            Session::flash('status', 'L\'objet à bien été modifié.');
            Session::flash('class', 'alert-success');


        }
        catch(\Exception $ex)
        {
            Session::flash('status','Une erreur est intervenue : '.$ex->getMessage() );
            Session::flash('class', 'alert-danger');
        }
        return redirect()->back();
    }
    public function delete($iditem)
    {
        $item = Items::find($iditem);
        try
        {
            $item->delete();
            Session::flash('status', 'L\'objet à bien été supprimé.');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'Une erreur est intervenue');
            Session::flash('class', 'alert-danger');
        }
        return redirect('inventory');
    }
    public function readrenters($iditem)
    {
        $item = Items::find($iditem);
        $locations = Renteditems::where('item_id',$iditem)->get();
        $benefit = 0- $item->cost;
        foreach ($locations as $location) {
            $duration_type = Durations::find($location->duration_id);
            $location->duration = $duration_type->details;
            $location->contracts = Contracts::where('ID_Contrat',$location->contract_id)->first();

            $location->customer = Customers::find(  $location->contracts['customer_id']);
            $benefit += $location->price;
        }

        return View::make('locations', [
            'item' => $item,
            'locations' => $locations,
            'benefit' => $benefit
        ]);
    }


}
