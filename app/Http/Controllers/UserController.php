<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

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
        $havehistory = "none";
        // $history = DB::table("booking")->where("id_penyewa","=",$userid)->get();
        $history = DB::select("
        SELECT
          b.id,k.kos_nama, k.kos_tipe, k.kos_alamat,k.kos_notelp,b.created_at
        FROM
            booking b 
        LEFT JOIN kos k on b.id_kos = k.id
        WHERE
         b.id_penyewa = ?
        ",[
            $userid
        ]);
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
        $user = Session::get('user');
            $iduser = $user->id;
            $u = User::find($iduser);
            $passlama = $u->password;
        if($request->validate([
            "edtusername"=>"required",
            "edtfullname"=>"required",
            "edtnumber"=>"required|numeric",
            "edtoldpass"=>'required',
            "edtnewpass"=>'required',
            "edtconpass"=>'required|same:edtnewpass'
        ])
        ){
            if (!password_verify($request->edtoldpass,$passlama)) {
                # code...
                Alert::warning('Error', "Password Lama tidak sesuai");

                return redirect('/user/profile');
            }
            else{

                $u = User::find($iduser);
                $u->username = $request->edtusername;
                $u->fullname = $request->edtfullname;
                $u->user_telp = $request->edtnumber;
                $u->password = Hash::make($request->edtnewpass);
                $u->save();
                Alert::success('Berhasil', "Ganti");
                return redirect('/user/profile');
            }
        }
        // $result = DB::update('update user set username = ?, fullname = ?, user_telp = ?',[
        //     $request->edtusername,
        //     $request->edtfullname,
        //     $request->edtnumber
        // ]);

        // if($result){
        //     return redirect('/user/profile')->with("success", "berhasil ubah profile user ");
        // }else{
        //     return redirect('/user/profile')->with("error", "Gagal ubah prodile user ");
        // }
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
