<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    function index() {
        $result = DB::select('select * from categories');
        return var_dump($result);
    }
}
