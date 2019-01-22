<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categories;
use App\Items;


class inventoryController extends Controller
{
    static public function testDB()
    {
        return Items::all();
    }
    private function create()
    {

    }
    private function read()
    {
        return true;
    }
    private function update()
    {

    }
    private function delete()
    {

    }

}
