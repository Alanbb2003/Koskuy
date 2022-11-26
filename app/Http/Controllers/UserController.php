<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function homepage(){

        $k = DB::table("kos")->where("status",'=',"aktif")->get();

        return view("home",['kos'=>$k]);
    }
    public function detailkos($id){
        try{
            $d = DB::table("kos")->where("id","=",$id)->first();
            //select foto , d_kos, dan furnitur waktu selesai seeder
            return view("user.detailkos",['detail'=>$d]);
        }catch(Exception $x){
            echo $x;
        }
    }
    public function profileuser(){
        $user = Session()->get('user');
        $countkos = DB::table('h_pembayaran')->where("user_id","=",$user->id)->count();
        return view("user.profile",["user"=>$user,"countkos"=>$countkos]);
    }
    public function historypage(){
        $user = Session::get('user');
        $data= json_decode( json_encode($user), true);
        $userid = $data['id'];
        $history = DB::table("h_pembayaran")->where("user_id","=",$userid)->get();
        if($history != null){
            $havehistory ="have";
        }else{
            $havehistory ="none";
        }
        return view("user.history",['havehistory'=>$havehistory,'history'=>$history]);
    }
    public function editpage(){

        return view("user.editprofile");
    }
}
