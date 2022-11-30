<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
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
            $user = Session::get("user");
            $userid = (string)$user->id;
            //select foto , d_kos, dan furnitur waktu selesai seeder
            return view("user.detailkos",['detail'=>$d, 'users'=>$userid]);
        }catch(Exception $x){
            echo $x;
        }
    }
    public function profileuser(){
        $userid = Session::get('user');
        $data= json_decode( json_encode($userid), true);
        $userid = $data['id'];
        $user = DB::table('user')->where("id","=",$userid)->first();
        $countkos = DB::table('h_pembayaran')->where("user_id","=",$userid)->count();
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
    public function editfunc(Request $request){
        $request->validate([
            "edtusername"=>"required",
            "edtfullname"=>"required",
            "edtnumber"=>"required|numeric",
        ]);

        $result = DB::update('update user set username = ?, fullname = ?, user_telp = ?',[
            $request->edtusername,
            $request->edtfullname,
            $request->edtnumber
        ]);

        if($result){
            return redirect('/user/profile')->with("success", "berhasil ubah profile user ");
        }else{
            return redirect('/user/profile')->with("error", "Gagal ubah prodile user ");
        }
    }
    public function booking(Request $request){
        $booking = new Booking();
        $booking->id_penyewa = $request->id_penyewa;
        $booking->id_kos = $request->id_kos;
        $booking->status = "pending";
        $booking->save();
        return redirect()->back()->with("success", "Berhasil Booking!");
    }
}
