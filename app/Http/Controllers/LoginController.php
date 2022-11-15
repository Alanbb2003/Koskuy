<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function LoginForm(){
        return view("Login");
    }
    public function LoginAction(Request $request){
        $request->validate([
            "inpUser"=>'required',
            "inpPassword"=>'required'
        ]);
        $selecteduser = DB::table('user')->where("user_username","=",$request->inpUser)->first();

        if($selecteduser->user_password == $request->inpPassword){
            Session::put('role',"pelanggan");
            Session::put('user',$selecteduser);
            return redirect('/home')->with("success","berhasil login");
        }
    }
}
