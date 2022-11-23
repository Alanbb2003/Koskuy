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

        $k = DB::table("kos")->get();

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

        return redirect(url('/listkos'))->with('searchstring',$searchstring);
    }
    public function listkos(){
        $searchstring = Session::get('searchstring');
        if($searchstring){
        $hasil = Kos::where("kos_alamat",
            "LIKE", "%".$searchstring."%")->orWhere("kos_nama",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kota",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kecamatan",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kelurahan",
            "LIKE", "%".$searchstring."%")
            ->paginate(5);
        }
        else{
            $hasil = DB::table("kos")->paginate(5);
        }
        return redirect(url("/kos"))->with('hasilsearch',$hasil)->with('searchstring',$searchstring);
    }
    public function searchkos(Request $request){
        $searchstring = $request->searchinput;
        $hasil = Kos::where("kos_alamat",
            "LIKE", "%".$searchstring."%")->orWhere("kos_nama",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kota",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kecamatan",
            "LIKE", "%".$searchstring."%")->orWhere("kos_kelurahan",
            "LIKE", "%".$searchstring."%")
            ->paginate(5);
        return redirect(url("/kos"))->with('hasilsearch',$hasil)->with('searchstring',$searchstring);
    }
}
