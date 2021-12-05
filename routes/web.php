<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::match(['get','post'],'/admin/login',[AdminController::class,'login']);
Route::match(['get','post'],'/settings',[AdminController::class,'settings']);
Route::post('/update/admin',[AdminController::class,'adminUpdate']);
Route::get('/logout',[AdminController::class,'logout']);
Route::get('/dashboard',[AdminController::class,'dashboard']);
Route::post('/admin/pass',[AdminController::class,'pass']);
//Route::resource('admin', AdminController::class);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
