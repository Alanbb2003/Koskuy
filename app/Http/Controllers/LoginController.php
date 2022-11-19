<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = $request->input("inpUser");
        $pass = $request->input("inpPassword");

        // if ($user == "admin" && $pass == "123")
        if (Auth::attempt(["username" => $user, "password" => $pass]))
        {
            // return (new Response("Berhasil Login!"))
            // ->cookie("userid", "admin",  (10*24*60));
            $selecteduser = DB::table('user')->where("username","=",$request->inpUser)->first();
            if($selecteduser->user_role == 1){
                Session::put('role',"pelanggan");
                Session::put('user',$selecteduser);
                return redirect('/home')->with("success","berhasil login");
            }else if($selecteduser->user_role == 2){
                Session::put('role',"pemilik");
                Session::put('user',$selecteduser);
                return redirect('/home')->with("success","berhasil login");
            }
        }
        else
        {
            return back()->with("error","gagal login");
        }
    }
}

