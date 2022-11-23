<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
                return redirect('/user')->with("success","berhasil login");
            }else if($selecteduser->user_role == 2){
                Session::put('role',"pemilik");
                Session::put('user',$selecteduser);
                return redirect('/owner')->with("success","berhasil login");
            }
            else if($selecteduser->user_role == 3){
                Session::put('role',"admin");
                Session::put('user',$selecteduser);
                return redirect('/admin')->with("success","berhasil login");
            }
        }
        else
        {
            return back()->with("error","gagal login");
        }
    }
    public function RegisterForm(){
        return view("register");
    }
    public function RegisterAction(Request $request){
        $request->validate([
            "regUser"=>"required",
            "regNama"=>"required",
            "role"=>"required",
            "regPass"=>"required",
            "conPass"=>'required|same:regPass',
            "regEmail"=>"required",
            "regTelp"=>"required|numeric|"
        ]);

        $cek = DB::table('user')->where("username","=",$request->regUser)->first();
        if($cek!=null){

            return back()->with("error","username sudah terpakai");
        }else{
            // $new = new User();
            // $new->username = $request->regUser;
            // $new->fullname = $request->regNama;
            // $new->email = $request->regEmail;
            // $new->password = password_hash($request->regPass,PASSWORD_DEFAULT);
            // $new->user_telp = $request->regTelp;
            // $new->user_role = $request->role;
            // $new->save();

            $result = User::create([
                "email"=> $request->regEmail,
                "username" => $request->regUser,
                "fullname"=> $request->regNama,
                "password" => password_hash($request->regPass,PASSWORD_DEFAULT),
                "user_telp" => $request->regTelp,
                "user_role" => $request->role,
                "status" => 1

            ]);

            $result->sendEmailVerificationNotification();

            return redirect(url("/verif"))->with("email", $request->regEmail);
            // return redirect("/login");


        }
    }


    public function verification(EmailVerificationRequest $r){

        $r->fulfill();

        $link = url("/");
        return response()->view("Email.HEmailDone")->withHeaders(["Refresh"=>"4;url=$link"]);
    }
}

