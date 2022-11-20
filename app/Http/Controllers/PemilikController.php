<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilikController extends Controller
{

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


}
