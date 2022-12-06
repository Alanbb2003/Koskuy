<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\Guest;
use App\Models\HPembayaran;
use App\Models\Kamar;
use App\Models\Kos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {return redirect('/home');});
// Route::get('/', function () {return view('home');});
Route::get('/',[Pagecontroller::class,"homepage"]);
Route::post('/',[Pagecontroller::class,"searchbutton"])->name("searchfunc");
Route::get("/kos",[Pagecontroller::class,"listkos"])->name("listkos");
Route::post("/kos",[Pagecontroller::class,"searchkos"])->name("searchkos");
// Route::get('/home',function(){return view('home');});
Route::get('/about',function(){return view('about');});

// Route::get('/login',function(){return view('Login');});
Route::get('/login',[LoginController::class,"LoginForm"])->middleware([Guest::class]);
Route::post('/login',[LoginController::class,"LoginAction"])->name("loginfunc");

Route::get('/register',[LoginController::class,"RegisterForm"])->middleware([Guest::class]);
Route::post('/register',[LoginController::class,"RegisterAction"])->name("registerfunc");


Route::view("/verif","Email.Hverify")->name("verification.notice");
Route::get("/verify/{id}/{hash}", [LoginController::class, "verification"])->name('verification.verify');

Route::middleware('checklogged:pelanggan')->group(function(){
    Route::prefix('/user',)->group(function(){
        Route::get('/',[UserController::class,"homepage"]);
        Route::get("/kos",[Pagecontroller::class,"listkos"])->name("listkos");
        Route::post("/kos",[Pagecontroller::class,"searchkos"])->name("searchkos");
        Route::get('/kos/{id}',[UserController::class,"detailkos"]);
        Route::post('/kos/booking',[UserController::class,"booking"])->name("booking");
        Route::get('/profile',[UserController::class,"profileuser"]);
        Route::get('/history',[UserController::class,"historypage"]);
        Route::post('/history',[UserController::class,"cancelbook"])->name("cancelbook");
        Route::get('/edit',[UserController::class,"editpage"]);
        Route::post('/edit',[UserController::class,"editfunc"])->name('saveedit');
    });
});

Route::middleware('checklogged:pemilik')->group(function(){
    Route::prefix('/owner',)->group(function(){
        Route::get('/',[Pagecontroller::class,"homepage"]);
        Route::get("/dashboard",[PemilikController::class, "HDashboard"]);
        Route::get("/profile",[PemilikController::class, "HEditProfile"]);
        Route::get("/profile",[PemilikController::class, "HEditProfile"]);
        Route::post("/editprofile",[PemilikController::class, "EditProfile"]);
        Route::get("/kos", [PemilikController::class, "HKos"]);
        Route::get("/pasangiklan", [PemilikController::class, "HPasangIklan"]);
        Route::get("/pesanansaya", [PemilikController::class, "HReqBooking"]);
        Route::get("/konfirmbooking/{id}",[PemilikController::class, "KonfirmasiBooking"]);
        Route::get("/Hgantipass", [PemilikController::class, "Hgantipass"]);
        Route::post("/gantipass", [PemilikController::class, "gantipass"]);
        // Route::get("/HTambahKos", [PemilikController::class, "HTambahKos"]);
        // Route::get("/pasangiklan",[PemilikController::class, "HTambahKos"]);
        Route::get("/riwayattransaksi",[PemilikController::class, "HRiwayatTransaksi"]);
        Route::get("/Huploadbukti/{id}",[PemilikController::class, "HUploadBukti"]);
        Route::post("/uploadbukti/{id}",[PemilikController::class, "UploadBukti"]);
        Route::post("/doAddKos", [PemilikController::class, "doAddKos"])->name("doAddKos");
        Route::get("/doAddKamar", [PemilikController::class, "tambahkamar"])->name("tambahkamar");
        Route::post("/doAddKamar", [PemilikController::class, "doAddKamar"])->name("doAddKamar");

        Route::get("/detailkos/{id}",[PemilikController::class, "detailKos"])->name("detailkos");

        Route::get("/preview", [PemilikController::class, "preview"])->name("preview");
        Route::get('/addKosToDB', function () {
            $kos = Session::get("dataKos");

            $kamar = Session::get("dataKamar");

            $item = new Kos();
            $item->kos_nama = $kos->nama;
            $item->kos_tipe = $kos->tipe;
            $item->kos_alamat = $kos->alamat;
            $item->kos_deskripsi = $kos->deskripsi;
            $item->kos_gambar = $kos->kos_gambar;
            $item->kos_notelp = $kos->notelp;
            $item->kos_provinsi = $kos->provinsi;
            $item->kos_kota = $kos->kota;
            $item->kos_kecamatan = $kos->kecamatan;
            $item->kos_kelurahan = $kos->kelurahan;
            $item->kos_kodepos = $kos->kodepos;
            $item->kos_link = $kos->link;
            $item->owner = $kos->owner;
            $item->status = "nonaktif";
            $item->save();

            $idkos =  DB::table("kos")->where("kos_nama","=",$kos->nama)->get()->first();
            // dd($idkos->id);
            $k = new Kamar();
            $k->jenis_kamar = $kamar->jenis;
            $k->harga_kamar = $kamar->harga;
            $k->jumlah_kamar = $kamar->jumlah;
            $k->luas_kamar = $kamar->luas;
            $k->status_kamar = $kamar->status;
            $k->deskripsi_kamar = $kamar->deskripsi;
            if ($kamar->ac != null) {
                $k->ac = 1;
            }
            if ($kamar->kmd != null) {
                $k->kmd = 1;
            }
            if ($kamar->wifi != null) {
                $k->wifi = 1;
            }
            if ($kamar->tv != null) {
                $k->tv = 1;
            }
            if ($kamar->kulkas != null) {
                $k->kulkas = 1;
            }
            $k->gambar_kamar = $kamar->gambar_kamar;
            $k->kos_id = $idkos->id;
            $k->save();

            $detailpaket = DB::table("paket_iklan")->where("id", "=",$kos->paket)->first();

            $hpembayaran = new HPembayaran();
            $hpembayaran->user_id = $kos->owner;
            $hpembayaran->paket_id = $kos->paket;
            $hpembayaran->kos_id = $item->id;
            $hpembayaran->harga = $detailpaket->harga;
            $hpembayaran->status = 0;
            $hpembayaran->tgl_trans = now();
            $hpembayaran->save();





            return redirect('/')->with("success","Berhasil melakukan transaksi!");
        })->name('addKosToDB');
    });
});

Route::middleware('checklogged:admin')->group(function(){
    Route::prefix('/admin',)->group(function(){

        Route::get('/',[AdminController::class,"toAdmin"])->name("toAdmin");

        Route::get('/listPemilik',[AdminController::class,"toListPemilik"])->name("toListPemilik");

        Route::get('/listPenyewa',[AdminController::class,"toListPenyewa"])->name("toListPenyewa");

        Route::get('/listpesanan',[AdminController::class, "HListPesanan"]);

        Route::get('/konfirmasipesanan/{id}',[AdminController::class, "KonfirmasiPesanan"]);

        Route::get('/laporanpendapatan',[AdminController::class,"HLaporanPendapatan"]);
        Route::get("/Flaporanpendapatan",[AdminController::class, "FLaporanPendapatan"]);
        Route::get("/chartpaket",[AdminController::class, "HChartPaket"]);
        // Route::get('/home', function () {
        //     if (!Session::has('lognamaL')) {
        //         return redirect()->route('login');
        //     }
        //     $listUser = DB::table('users')->get();
        //     $listItems = DB::table('item')->get();
        //     return view("home", ["listUser" => $listUser]);
        // });
    });
});

//Route::get('/dashboard',function(){return view('admin.dashboard');});

Route::get('/logout', function () {
    Session::forget('role');
    Session::forget('user');
    return redirect('/');
})->name('logout');


Route::post("/coba",[PemilikController::class, "coba"]);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/anjay", function(){

});
