<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {return redirect('/home');});

Route::get('/home',function(){return view('home');})->name('home');
Route::get('/about',function(){return view('about');});

// Route::get('/login',function(){return view('Login');});
Route::get('/login',[LoginController::class,"LoginForm"]);
Route::post('/login',[LoginController::class,"LoginAction"])->name("loginfunc");



Route::get('/register',[LoginController::class,"RegisterForm"]);
Route::post('/register',[LoginController::class,"RegisterAction"])->name("registerfunc");



Route::get('/dashboard',function(){return view('admin.dashboard');});

Route::get('/logout', function () {
    Session::forget('role');
    Session::forget('user');
    return redirect()->route('home');
})->name('logout');

