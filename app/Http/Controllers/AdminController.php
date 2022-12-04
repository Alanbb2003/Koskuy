<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\HPembayaran;
use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function toAdmin(){

        // $booked = DB::select(DB::raw("
        // SELECT
        //  k.kos_nama,count(b.id_kos) as total
        // FROM
        //     booking b
        // LEFT JOIN kos k on b.id_kos = k.id
        // Group by
        //  b.id,k.kos_nama
        // "));
        $booked = Booking::select(DB::raw("COUNT(*) as count"),DB::raw("MONTHNAME(created_at) as month_name"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count','month_name');
        $labels = $booked->keys();
        $data = $booked->values();

        return view('admin.dashboard', compact('labels', 'data'));
        // return view("admin.dashboard");
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


    public function HListPesanan(){
        $h = DB::table("h_pembayaran")->get();
        $data = DB::table("h_pembayaran")->join("user",'user.id','=','h_pembayaran.user_id')->join("kos","kos.id",'=','h_pembayaran.kos_id')->join("paket_iklan",'paket_iklan.id','=','h_pembayaran.paket_id')->get();

        return view("admin.listpesanan",["data" => $data, "h"=>$h]);
    }

    public function KonfirmasiPesanan($id){

        $hp = HPembayaran::find($id);
        $hp->status = "2";
        $hp->save();

        $kos = Kos::find($hp->kos_id);
        $kos->status = "aktif";
        $kos->save();

        return redirect('/admin/listpesanan');

    }


    public function HLaporanPendapatan(){

        
        return view("admin.laporanpendapatan");
    }


}
