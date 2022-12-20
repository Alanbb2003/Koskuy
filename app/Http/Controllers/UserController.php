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
use Illuminate\Support\Str;

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
            $kamar = DB::table('kamar')->where("kos_id","=",$d->id)->get();
            $havekamar = "none";
            if($kamar!=null){
                $havekamar ="have";
            }
            //select foto , d_kos, dan furnitur waktu selesai seeder
            return view("user.detailkos",['detail'=>$d, 'users'=>$userid,'kamar'=>$kamar,'havekamar'=>$havekamar]);
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
          b.booking_id,b.booking_status,k.kos_nama, k.kos_tipe, k.kos_alamat,k.kos_notelp,b.created_at
        FROM
            booking b
        LEFT JOIN kos k on b.id_kos = k.id
        WHERE
         b.id_penyewa = ?
        ",[
            $userid
        ]);
        // if($history != null){
        //     $havehistory ="have";
        // }else{
        //     $havehistory ="none";
        // }
        return view("user.history",['history'=>$history]);
    }
    public function editpage(){
        $userid = Session::get('user');
        $data= json_decode( json_encode($userid), true);
        $userid = $data['id'];
        $user = DB::table('user')->where("id","=",$userid)->first();
        return view("user.editprofile",['user'=>$user]);
    }
    public function editfunc(Request $request){
        $gambar = $request->file("edtphoto");
        $user = Session::get('user');
            $iduser = $user->id;
            $u = User::find($iduser);
            $passlama = $u->password;
            $rules = [
                "edtusername"=>"required",
                "edtfullname"=>"required",
                "edtnumber"=>"required|numeric",
                "edtphoto."=>"mimes:png,jpg,jpeg|max:2048",
                "edtoldpass"=>'required',
                "edtnewpass"=>'required',
                "edtconpass"=>'required|same:edtnewpass'
            ];
            $messages = [
                "required" => "please fill out this field",
                "numeric" => "must be numbers",
                "same"=>"Must be the same as new password"
            ];
        if(
            $request->validate($rules, $messages)
        ){
            $usernamehave = DB::table('user')->where("username","=",$request->edtusername);
            if (!password_verify($request->edtoldpass,$passlama)) {
                # code...
                Alert::warning('Error', "Password Lama tidak sesuai");

                return redirect('/user/profile');
            }else if($usernamehave != null){
                Alert::warning('Error', "Username sudah dipakai");

                return redirect('/user/profile');
            }
            else{
                $photo = $request->edtphoto;
                if($photo!= null){
                    $namaFileGambar  = Str::random(8).".".$gambar->getClientOriginalExtension();
                    $namaFolderPhoto = "gambar/";
                    // storeAs akan menyimpan default ke local
                    $gambar->storeAs($namaFolderPhoto,$namaFileGambar, 'public');
                    $u = User::find($iduser);
                    $u->username = $request->edtusername;
                    $u->fullname = $request->edtfullname;
                    $u->user_telp = $request->edtnumber;
                    $u->password = Hash::make($request->edtnewpass);
                    $u->user_gambar = $namaFileGambar;
                    $u->save();
                    Session::put("user",$u);
                }else{
                    $u = User::find($iduser);
                    $u->username = $request->edtusername;
                    $u->fullname = $request->edtfullname;
                    $u->user_telp = $request->edtnumber;
                    $u->password = Hash::make($request->edtnewpass);
                    $u->save();
                    Session::put("user",$u);
                }
                
                Alert::success('Berhasil', "Ganti");
                return redirect('/user/profile');
            }
        }
    }
    public function booking(Request $request){
        $booking = new Booking();
        $booking->id_penyewa = $request->id_penyewa;
        $booking->id_owner = $request->id_owner;
        $booking->id_kos = $request->id_kos;
        $booking->id_kamar = $request->id_kamar;
        $booking->booking_status = "pending";
        $booking->save();
        Alert::success("Berhasil", "Berhasil Booking");
        return redirect()->back();
    }
    public function cancelbook(Request $request){
        $booking = Booking::find($request->id_booking);
        $booking->booking_status = "canceled";
        $booking->save();
        Alert::success('Berhasil', "Cancel");
        return redirect('/user/history');
    }
    public function detailkamar($id){
        try{
            $d = DB::table("Kamar")->where("kamar_id","=",$id)->first();
            //select foto , d_kos, dan furnitur waktu selesai seeder
            return view("user.detailkamar",['detail'=>$d]);
        }catch(Exception $x){
            echo $x;
        }
    }
}
