<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categories;
use App\Items;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use View;


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
                $item->itemnb = $request->input('nb_input');
                $item->brand =  $request->input('brand_input');
                $item->model = $request->input('model_input');
                $item->size = $request->input('size_input');
                $item->category_id = $request->input('category_input');
                $item->cost = $request->input('price_input');
                $item->return = $request->input('return_input');
                $item->type = $request->input('type_input');
                $item->stock = $request->input('stock_input');
                $item->serialnumber = $request->input('serial_input');
                if($item->save())

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
        return View::make('item', [
            'item' => $item

        ]);
    }
    private function update()
    {

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


}
