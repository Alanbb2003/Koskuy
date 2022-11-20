<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function coba(Request $request){
        dd($request->nama);
    }


    //H = Halaman
    public function HDashboard(){
        return view("pemilik.dashboard");
    }
    public function HEditProfile(){
        return view("pemilik.profile");
    }
    public function HKos(){
        return view("pemilik.kos");
    }
    public function HPasangIklan(){
        return view("pemilik.pasangiklan");
    }
    public function HPesananSaya(){
        return view("pemilik.pesanansaya");
    }
    public function HTambahKos(){
        return view("pemilik.tambahkos");
    }


}
