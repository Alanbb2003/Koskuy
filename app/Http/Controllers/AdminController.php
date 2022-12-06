<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\HPembayaran;
use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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


    public function HLaporanPendapatan(Request $req){

        $data = [];
        $total = 0;
        return view("admin.laporanpendapatan",["data"=>$data,"total"=>$total]);
    }

    public function FLaporanPendapatan(Request $req){

        $tgl1 = $req->date("tgl1");
        $tgl2 = $req->date("tgl2");

        if ($tgl1 == "" || $tgl2 == "") {
            # code...
            Alert::error("Warning","Tanggal Awal dan Akhir harus di isi");
            return redirect()->back();
        }

        $data = DB::table("h_pembayaran")->join('paket_iklan','paket_iklan.id','=','h_pembayaran.paket_id')->where("h_pembayaran.status",'=',2)->where("h_pembayaran.tgl_trans",'>=',$tgl1)->where("h_pembayaran.tgl_trans",'<=',$tgl2)->get();
        // $data2 = DB::table("h_pembayaran")->where("h_pembayaran.status",'=',2)->where("tgl_trans",'>=',$tgl1)->where("tgl_trans",'<=',$tgl2)->get();

        // dd($data->nextPageUrl());

        $total = 0;
        foreach ($data as $key => $value) {
            # code...
            $total += $value->harga;
        }
        // dd($total);
        return view("admin.laporanpendapatan",["data"=>$data,"total"=>$total]);
    }

    public function HChartPaket(){

        // $data = DB::select("SELECT concat('paket ' , paket_id) as paket, count(*) as jumlah from h_pembayaran group by paket_id ");
        $data = DB::select("SELECT paket_id as paket, count(*) as jumlah from h_pembayaran group by paket_id ");
        // dd($data);


        return view("admin.laporanpaket",["data"=>$data]);
        // foreach($umur as $as => $um){
        //     $isi = ["label"=>"$um->umur", "y"=>"$um->jumlah"];
        //     array_push($dataPoints, $isi);
        // }

    }

    public function HLJumlahKos(){

        $data = DB::select("SELECT *, count(*) as jumlah from kos k join user u on k.owner=u.id group by k.owner");

        // dd($data);

        return view("admin.laporanjumlahkos",["data"=>$data]);
    }


}
