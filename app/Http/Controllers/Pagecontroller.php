<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pagecontroller extends Controller
{
    public function homepage(){

        $k = DB::table("kos")->get();

        return view("home",['kos'=>$k]);
    }
}
