<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function RegisterForm(){
        return view("register");
    }
    public function RegisterAction(Request $request){
        $request->validate([
            "regUser"=>"required",
            "regNama"=>"required",
            "role"=>"required",
            "regPass"=>"required",
            "conPass"=>'required|same:regPass'
        ]);

        $cek = DB::table('user')->where("username","=",$request->regUser)->first();
        if($cek!=null){

        }else{
            return back()->with("error","username sudah terpakai");
        }
    }
}
