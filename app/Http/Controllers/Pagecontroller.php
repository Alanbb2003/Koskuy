<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Pagecontroller extends Controller
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

    public function searchbutton(Request $request){

        $searchstring = $request->searchinput;

        return redirect(url("/kos"))->with('searchstring',$searchstring);
    }

    public function listkos(Request $request){
        $searchstring = Session::get('hasil');
        $searchjenis = $request->jeniskos;
        $tablejenis = DB::table("kos")->where("kos_tipe",'=', $searchjenis)->get();
        
        if($searchjenis == "Semua"){
            $hasil = DB::table("kos")->where("kos_kota",
            "LIKE", "%".$searchstring."%")->get();
        }
        else{
            $hasil = Kos::where("kos_tipe" , "LIKE", "%".$searchjenis."%")->where("kos_kota",
            "LIKE", "%".$searchstring."%")->get();
        }
        // if($searchstring){
        // $hasil = Kos::where("kos_alamat",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_nama",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_kota",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_kecamatan",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_kelurahan",
        //     "LIKE", "%".$searchstring."%")
        //     ->paginate(5);
        // }
        // else{
        //     $hasil = DB::table("kos")->paginate(5);
        // }
        return view("listkos",['hasilsearch'=>$hasil , 'searchstring'=>$searchstring]);
    }


    public function searchkos(Request $request){
        $searchstring = $request->searchinput;
        $searchjenis = $request->jeniskos;
        $filterkota = $request->kotafilter;
        $hargaawal = $request->hawal;
        $hargaakhir = $request->hakhir;

        if($searchjenis == "Semua" && $filterkota == "Semua"){
            $hasil = DB::table("kos")->where("kos_nama",
            "LIKE", "%".$searchstring."%")->get();
        
        }
        else{
            $hasil = Kos::where("kos_tipe" , "LIKE", "%".$searchjenis."%")->where("kos_nama",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kota", "LIKE", "%".$filterkota."%")->get();
        }
        // $hasil = Kos::where("kos_alamat",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_nama",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_kota",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_kecamatan",
        //     "LIKE", "%".$searchstring."%")->orWhere("kos_kelurahan",
        //     "LIKE", "%".$searchstring."%")
        //     ->paginate(5);
        return view("listkos",['searchstring'=>$searchstring, 'searchjenis'=>$searchjenis, 'hasilsearch'=>$hasil]);//->with('hasil',$hasil);
    }
}
