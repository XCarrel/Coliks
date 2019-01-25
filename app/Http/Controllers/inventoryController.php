<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Categories;
use App\Items;
use Illuminate\Support\Facades\Input;


class inventoryController extends Controller
{
    static public function testDB()
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
                $item->nb = 2000;
                $item->brand =  $request->input('brand');
                $item->model = $request->input('model');
                $item->size = $request->input('size');
                $item->category_id = $request->input('category_id');
                $item->cost = $request->input('cost');
                $item->return = $request->input('return');
                $item->type = $request->input('type');
                $item->stock = $request->input('stock');
                $item->serial = $request->input('serialnumber');

                $item->save();

                Session::flash('status', 'l\'objet à bien été crée.');
                Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'Une erreur est intervenue : veuillez remplir tous les champs svp');
            Session::flash('class', 'alert-danger');
        }
        return redirect('inventory');
    }
    private function read()
    {

    }
    private function update()
    {

    }
    private function delete(request $request)
    {
        $item = Items::find($request->input('item_id'));
        try
        {
            $item->delete();
            Session::flash('status', 'l\'objet à bien été supprimé.');
            Session::flash('class', 'alert-success');
        }
        catch(\Exception $ex)
        {
            Session::flash('status', 'Une erreur est intervenue');
            Session::flash('class', 'alert-danger');
        }
        return redirect('inventory');
    }


}
