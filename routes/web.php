<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {return view('home');});


Route::get('/About',function(){return view('About');});

Route::get('/login',function(){return view('Login');});

    
// Route::get('/login',[LoginController::class,"LoginForm"]);
// Route::post("/login", [LoginController::class, "LoginAction"]);

Route::get('/regis',function(){return view('register');});
// Route::get('/product',function(){return view('product');});


Route::get('/dashboard',function(){return view('admin.dashboard');});


