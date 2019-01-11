<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\categories;

class inventoryController extends Controller
{
    static public function testDB()
    {
        return categories::all();
    }

}
