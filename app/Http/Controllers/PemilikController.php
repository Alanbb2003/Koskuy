<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
    public function tambahkamar(){
        return view("pemilik.tambahkamar");
    }
    public function preview(){
        return view("pemilik.preview");
    }
    public function Hgantipass(){
        return view("pemilik.gantipass");
    }
    public function gantipass(Request $req){

        
        dd()
        // if ($req->validate(
        //     [
        //         ''
        //     ],
        //     [

        //     ]
        // )) {
        //     # code...
        // }

        return view("pemilik.gantipass");
    }
    public function doAddKos(Request $request){
        $nama = $request->input("nama");
        $tipe = $request->input("tipe");
        $alamat = $request->input("alamat");
        $deskripsi = $request->input("deskripsi");
        $gambar = $request->file("gambar");
        $notelp = $request->input("notelp");
        $provinsi = $request->input("provinsi");
        $kota = $request->input("kota");
        $kecamatan = $request->input("kecamatan");
        $kelurahan = $request->input("kelurahan");
        $kodepos = $request->input("kodepos");
        $link = $request->input("link");

        $user = Session::get('user');
        $iduser = $user->id;

        $rules =[
                "nama" => "required",
                "tipe" => "required",
                "alamat" => "required",
                "deskripsi" => "required",
                "gambar" => "required",
                "gambar.*" => "mimes:png,jpg,jpeg|max:2048",
                // cek per FOTO dan SETELAH DIUPLOAD, 2mb maksimal
                // hanya boleh .png, .jpg, .jpeg
                "notelp" => "required",
                "provinsi" => "required",
                "kota" => "required",
                "kecamatan" => "required",
                "kelurahan" => "required",
                "kodepos" => "required",
                "link" => "required"
            ];
        $request->validate($rules);

        $namaFileGambar  = Str::random(8).".".$gambar->getClientOriginalExtension();
        $namaFolderPhoto = "gambar/";
        // storeAs akan menyimpan default ke local
        $gambar->storeAs($namaFolderPhoto,$namaFileGambar, 'public'); // masuk ke storage/app/public

        if ($nama == "" || $tipe == "" || $alamat == ""|| $deskripsi == ""|| $notelp == ""|| $provinsi == ""|| $kota == ""|| $kecamatan == "" || $kelurahan == "" || $kodepos == "" || $link == "") {
            return redirect()->route('tambahkos')->with("error", "Field Harus terisi semua!");
        } else {
            $item = new Kos();
            $item->nama = $request->nama;
            $item->tipe = $request->tipe;
            $item->alamat = $request->alamat;
            $item->deskripsi = $request->deskripsi;
            $item->kos_gambar = $namaFileGambar;
            $item->notelp = $request->notelp;
            $item->provinsi = $request->provinsi;
            $item->kota = $request->kota;
            $item->kecamatan = $request->kecamatan;
            $item->kelurahan = $request->kelurahan;
            $item->kodepos = $request->kodepos;
            $item->link = $request->link;
            $item->owner = $iduser;
            Session::put("dataKos", $item);
            // $item->save();
            // $coba = Item::create($addItem);
            return redirect()->route("tambahkamar");
        }
    }

    public function doAddKamar(Request $request){
        $jenis = $request->input("jenis");
        $harga = $request->input("harga");
        $jumlah = $request->input("jumlah");
        $luas = $request->input("luas");
        $status = $request->input("status");
        $deskripsi = $request->input("deskripsi");
        $ac = $request->input("ac");
        $kmd = $request->input("kmd");
        $wifi = $request->input("wifi");
        $tv = $request->input("tv");
        $kulkas = $request->input("kulkas");
        $gambar = $request->file("gambar");

        $kos = Session::get("dataKos");
        $idkos = $kos->id;

        $rules =[
                "jenis" => "required",
                "harga" => "required",
                "jumlah" => "required",
                "luas" => "required",
                "status" => "required",
                "deskripsi" => "required",
                "gambar" => "required",
                "gambar.*" => "mimes:png,jpg,jpeg|max:2048"
                // cek per FOTO dan SETELAH DIUPLOAD, 2mb maksimal
                // hanya boleh .png, .jpg, .jpeg
            ];
        $request->validate($rules);

        $namaFileGambar  = Str::random(8).".".$gambar->getClientOriginalExtension();
        $namaFolderPhoto = "gambar/";
        // storeAs akan menyimpan default ke local
        $gambar->storeAs($namaFolderPhoto,$namaFileGambar, 'public'); // masuk ke storage/app/public

        if ($jenis == "" || $harga == "" || $jumlah == ""|| $luas == ""|| $status == ""|| $deskripsi == "") {
            return redirect()->route('tambahkamar')->with("error", "Field Harus terisi semua!");
        } else {
            $item = new Kamar();
            $item->jenis = $request->jenis;
            $item->harga = $request->harga;
            $item->jumlah = $request->jumlah;
            $item->luas = $request->luas;
            $item->status = $request->status;
            $item->deskripsi = $request->deskripsi;
            $item->ac = $request->ac;
            $item->kmd = $request->kmd;
            $item->wifi = $request->wifi;
            $item->tv = $request->tv;
            $item->kulkas = $request->kulkas;
            $item->gambar_kamar = $namaFileGambar;
            $item->kos_id = $idkos;
            Session::put("dataKamar", $item);
            // $item->save();
            // $coba = Item::create($addItem);
            // return view("pemilik.preview");
            return redirect()->route('preview');
        }
    }
}
