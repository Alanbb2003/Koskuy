<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function LoginForm(){
        return view("Login");
    }
    public function LoginAction(Request $request){
        $user = $request->input("inpUser");
        $pass = $request->input("inpPassword");

        if($user !="" && $pass !=""){
            if($user == "admin" && $pass == "admin"){
                return view("admin.homeadmin");
            }
            else{
                return view("product");
            }
        }
    }
}
