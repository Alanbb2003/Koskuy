<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function toAdmin(){
        return view("admin.dashboard");
    }

    public function toListPenyewa(){

        // Route::get('/home', function () {
        //     if (!Session::has('lognamaL')) {
        //         return redirect()->route('login');
        //     }
        //     $listUser = DB::table('users')->get();
        //     $listItems = DB::table('item')->get();
        //     return view("home", ["listUser" => $listUser]);
        // });
        //$user = DB::table('users')->where('Username','=',Session::get('lognamaL'))->first();
        $listUser = DB::table('user')->where('user_role', '=', 1)->get();

        return view("admin.listpenyewa", ["listUser" => $listUser]);
    }


    public function toListPemilik(){

        $listUser = DB::table('user')->where('user_role', '=', 2)->get();
        return view("admin.listpemilik", ["listUser" => $listUser]);
    }

    
}
