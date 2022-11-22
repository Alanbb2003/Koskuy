<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\PemilikController;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\Guest;

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

// Route::get('/home',function(){return view('home');});
Route::get('/about',function(){return view('about');});

// Route::get('/login',function(){return view('Login');});
Route::get('/login',[LoginController::class,"LoginForm"])->middleware([Guest::class]);
Route::post('/login',[LoginController::class,"LoginAction"])->name("loginfunc");

Route::get('/register',[LoginController::class,"RegisterForm"])->middleware([Guest::class]);
Route::post('/register',[LoginController::class,"RegisterAction"])->name("registerfunc");

Route::middleware('checklogged:pelanggan')->group(function(){
    Route::prefix('/user',)->group(function(){
        Route::get('/',[Pagecontroller::class,"homepage"]);
        Route::get('/detail/{id}',[Pagecontroller::class,"detailkos"]);
    });
});

Route::middleware('checklogged:pemilik')->group(function(){
    Route::prefix('/owner',)->group(function(){
        Route::get('/',function(){return view('home');});
        Route::get("/dashboard",[PemilikController::class, "HDashboard"]);
        Route::get("/profile",[PemilikController::class, "HEditProfile"]);
        Route::get("/kos", [PemilikController::class, "HKos"]);
        Route::get("/pasangiklan", [PemilikController::class, "HPasangIklan"]);
        Route::get("/pesanansaya", [PemilikController::class, "HPesananSaya"]);
        Route::get("/HTambahKos", [PemilikController::class, "HTambahKos"]);
    });
});

Route::get('/dashboard',function(){return view('admin.dashboard');});

Route::get('/logout', function () {
    Session::forget('role');
    Session::forget('user');
    return redirect('/');
})->name('logout');


Route::post("/coba",[PemilikController::class, "coba"]);

