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
    public function create()
    {
        if(Request::ajax())
        {
            $data = Input::all();
            try
            {
                $item = new Items();

                //$item->
                //$item->
                //$item->save();
                return response(200);
            }
            catch(\Exception $er)
            {
                return response(" Veuillez vérifier que tous les champs aient bien étés remplis correctement" ,400);
            }
        }
        else
            return response('error',500);
    }
    private function read()
    {

    }
    private function update()
    {

    }
    private function delete()
    {

    }

}
