<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinanceController;
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
    return Inertia::render('app');
});
Route::get('/Navbar',function(){
    return view('Navbar');});

Route::get('/HomeMembers', [HomeController::class,'HomeMember'])->name('HomeMember');
//Route::get('/HomeMembers/chaenge-role', [HomeController::class,'chaengeRole']);
Route::get('/search', [HomeController::class,'search']);
Route::get('/HomeMembers/addmember',[HomeController::class,'index']);
Route::post('/HomeMembers/addmember',[HomeController::class,'store']);
Route::get('/HomeMembers/{id}/update',[HomeController::class,'update']);
Route::put('/HomeMembers/{id}/update',[HomeController::class,'edit']);

Route::delete('/service-cate-delete/{id}',[HomeController::class,'delete']);
//Route::put('/HomeMembers/{id}/delete',[HomeController::class,'delete']);
//Route::get('/addmember', function() { return View::make('layouts.Navbar'); });

Route::get('/Finance', [FinanceController::class,'order'])->name('finance');
Route::get('order/{id}',[FinanceController::class,'updateStatus']);
