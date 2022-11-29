<?php

namespace App\Http\Controllers;

use App\Models\HPembayaran;
use App\Models\Kamar;
use App\Models\Kos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

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
        $user = Session::get('user');
        // $iduser = $user->id;
        // $user = Session::get('user');
        $iduser = $user->id;
        $u = User::find($iduser);

        return view("pemilik.profile" ,["CUser"=>$u]);
    }
    public function EditProfile(Request $req){
        $user = Session::get('user');
        // $iduser = $user->id;
        // $user = Session::get('user');
        $iduser = $user->id;
        $u = User::find($iduser);

        $fullname = $req->EPNamaLengkap;
        $nomor = $req->EPNoTelp;

        if ($fullname != "" && $nomor != "") {
            # code...
            $u->fullname = $fullname;
            $u->user_telp = $nomor;
            $u->save();

            Alert::success("Berhasil", "Profile Diubah");
            return redirect()->back();

        }
        else{
            Alert::error("Ada Field Kosong", "Semua Field Harus DI isi");
            return redirect()->back();
        }




        return view("pemilik.profile");
    }
    public function HKos(){
        $user = Session::get('user');
        $iduser = $user->id;

        $data = DB::table('kos')->where("owner" ,'=',$iduser)->where("status",'=','aktif')->get();

        return view("pemilik.kos",["datakos" => $data]);
    }
    public function HPasangIklan(){



        return view("pemilik.pasangiklan");
    }
    public function HPesananSaya(){
        return view("pemilik.pesanansaya");
    }
    public function HTambahKos(){
        $paket = DB::table("paket_iklan")->get();
        return view("pemilik.tambahkos",["paket"=>$paket]);
    }
    public function tambahkamar(){
        return view("pemilik.tambahkamar");
    }
    public function preview(){
        return view("pemilik.preview");
    }
    public function Hgantipass(){
        $user = Auth::user();
        return view("pemilik.gantipass", ["cuser"=>$user]);
    }
    public function HRiwayatTransaksi(){
        $user = Session::get('user');
        $iduser = $user->id;
        $h = DB::table("h_pembayaran")->where("user_id",'=',$iduser)->get();
        $datatrans = DB::table("h_pembayaran")->join("kos","kos.id",'=','h_pembayaran.kos_id')->join("paket_iklan",'paket_iklan.id','=','h_pembayaran.paket_id')->where("user_id",'=',$iduser)->get();

        return view("pemilik.riwayattransaksi", ["datatrans"=> $datatrans, "h"=>$h]);
    }

    public function HUploadBukti($id){

        return view("pemilik.uploadbukti",["idhp"=>$id]);

    }

    public function UploadBukti(Request $req, $id){


        if ($req->validate(
            [
                "buktitf" =>"required"
            ],
            [

            ]
        )) {
            # code...
            $bukti = $req->file("buktitf");
            $namafile = Str::random(8).'.'.$bukti->getClientOriginalExtension();

            $namaFolderPhoto = "bukti/";
            $bukti->storeAs($namaFolderPhoto, $namafile, 'public');

            $hp = HPembayaran::find($id);
            $hp->bukti = $namafile;
            $hp->status = 1;
            $hp->save();

            return redirect('/owner/riwayattransaksi');
        }


    }
    public function gantipass(Request $req){

        $user = Session::get('user');
        // $iduser = $user->id;
        // $user = Session::get('user');
        $iduser = $user->id;
        $u = User::find($iduser);
        $passlama = $u->password;

        // dd(nama);

        // dd()
        if ($req->validate(
            [
                'PLama' => 'required',
                'PBaru' => 'required',
                'PCBaru' => 'required|same:PBaru'
            ],
            [

            ]
        )) {
            # code...
            // $reqpaslama = password_hash($req->input('PLama'), PASSWORD_DEFAULT);
            if (!password_verify($req->PLama,$passlama)) {
                # code...
                Alert::warning('Error', "Password Lama tidak sesuai");

                return redirect()->back();
            }
            else{

                $u = User::find($iduser);
                $u->password = Hash::make($req->PBaru);
                $u->save();
                Alert::success('Berhasil', "Ganti");
                return redirect()->back();
            }

        }

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
        $paket = $request->paketkos;

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
            $item->paket = $paket;
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
