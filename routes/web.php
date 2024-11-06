<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderHomeController;
use App\Http\Controllers\TodayController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Models\SliderHome;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('auth.register');
});


Route::get('/login',function(){
    return view('auth.login');
});

Route::get('/dashboard',function(){
    return view('welcome');
});

Route::post('logout',[UserController::class,'logout'])->name('logout');

Route::middleware(['SudahLogin'])->controller(UserController::class)->group(function(){
    Route::post('/register','store')->name('register');
    Route::post('/login','index')->name('login');
    Route::get('/login','login');
    Route::get('/register','register');

});

Route::middleware(['BelumLogin'])->group(function(){
    Route::get('/index',function(){
        $slider = SliderHome::all();
        return view('tampilan.index',compact('slider'));
    });
});

Route::controller(SliderHomeController::class)->group(function(){
    Route::get('/sliderhome','index');
    Route::get('/sliderhome/tambah','create');
    Route::post('/sliderhome/tambah','store')->name('storeslider');
    Route::get('/sliderhome/edit/{id}','edit');
    Route::post('/sliderhome/edit/{id}','update');
    Route::get('/sliderhome/destroy/{id}','destroy');
});

Route::controller(TodayController::class)->group(function(){
    Route::get('/today','index');
    Route::get('/today/tambah','create');
    Route::post('/today/tambah','store')->name('storetoday');
    Route::get('/today/edit/{id}','edit');
    Route::post('/today/edit/{id}','update');
    Route::get('/today/destroy/{id}','destroy');
});


