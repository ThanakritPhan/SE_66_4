<?php

use App\Http\Controllers\ConfirmOrder;
use App\Http\Controllers\confirmPromotion;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Promotion;
use App\Http\Controllers\addPromotion;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NotiController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\UserOrAdminController;
use App\Http\Controllers\HistoryDetailController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('UserOrAdmin');
});
//emp
Route::get('/HomeHR', function () {
    return view('HomeHR');
});
//ProductMem,Cart
/*Route::get('/welcome', function () {
    $ses = session()->all();
    //dd($ses);
    return view('welcome',compact('ses'));
});*/
Route::get('welcome',[WelcomeController::class,'index'])->name('welcome');
Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('cart/{productID}',[CartController::class,'addToCart'])->name('cartAdd');
Route::get('cart',[CartController::class,'index'])->name('cart');
Route::get('deleteCart/{productID}',[CartController::class,'deleteCart'])->name('deleteCart');
Route::get('deletePd/{productID}',[CartController::class,'deletePd'])->name('deletePd');
Route::get('clearCart/{productID}',[CartController::class,'clearCart'])->name('clearCart');
//KUY RAI PROMOTION KUB
Route::get('/Promotion',[Promotion::class,'index'])->name('Promotion');
Route::get('/Promotion/add',[addPromotion::class,'index'])->name('addPromotion');
Route::get('/Promotion/confirm',[confirmPromotion::class,'index']);
Route::get('/Promotion/confirmReal',[confirmPromotion::class,'index']);
Route::get('/DeletePromotion', function () {
    return "<h1>Edit Pro</h1>";
});
Route::get('/Promotion/delete/{id}',[Promotion::class,'delete'])->name('deletepromo');
Route::get('/Promotion/info/{id}',[Promotion::class,'info'])->name('promoinfo');
Route::post('/Promotion/confirm',[addPromotion::class,'confirm'])->name('submit.form');
Route::post('/Promotion/confirmReal',[confirmPromotion::class,'confirmkub'])->name('confirm.form');
//Order
Route::get('order',[OrderController::class,'index'])->name('order');
Route::post('confirmOrder',[ConfirmOrder::class,'confirm'])->name('confirm'); 
Route::post('cart', [ConfirmOrder::class, 'clearCart'])->name('clearCart');
//member ->pang

Route::get('/HomeHR', [HomeController::class,'HomeMember'])->name('HomeMember');
Route::get('/search', [HomeController::class,'search']);
Route::get('/HomeHR/addmember',[HomeController::class,'index']);
Route::post('/HomeHR/addmember',[HomeController::class,'store']);
Route::get('/HomeHR/{id}/update',[HomeController::class,'update']);
Route::put('/HomeHR/{id}/update',[HomeController::class,'edit']);
Route::delete('/service-cate-delete/{id}',[HomeController::class,'delete']);
//Finance ->pang
Route::get('/Finance', [FinanceController::class,'order'])->name('finance');
Route::get('order/{id}',[FinanceController::class,'updateStatus']);

//earth
Route::get('/homeAdmin',[HomeController::class,'indexAdmin']); 

Route::get('/History',[HistoryController::class,'index'])->name('History');
Route::get('History/info/{id}',[HistoryDetailController::class,'index'])->name('info');
Route::get('/Notification',[NotiController::class,'noti'])->name('Notification'); 

Route::get('/login',[AuthUserController::class,'login'])->name('login');  
Route::post('/login',[AuthUserController::class,'loginPost'])->name('login'); 
Route::delete('/logout',[AuthUserController::class,'logout'])->name('logout');

Route::get('/loginAdmin',[AuthAdminController::class,'loginAdmin'])->name('loginAdmin');  
Route::post('/loginAdmin',[AuthAdminController::class,'loginPostAdmin'])->name('loginAdmin'); 
Route::delete('/logoutAdmin',[AuthAdminController::class,'logoutAdmin'])->name('logoutAdmin');

Route::get('/UserOrAdmin',[UserOrAdminController::class,'index']); 

//stock -> aum
Route::get('stock_store',[ProductController::class,'stock'])->name('stock_store');
Route::get('stock_edit',[ProductController::class,'stock_edit'])->name('stock_edit');
Route::get('/products/create', [ProductController::class, 'create'])->name('create');
Route::post('/product/created', [ProductController::class, 'store'])->name('store');
Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('product/{id}/product', [ProductController::class, 'update'])->name('update');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('delete');

//promotion + group -> bank
Route::get('/promotions', [PromotionController::class,'promotion'])->name('promotion');
Route::get('/receipt/{proID}', [ReceiptController::class,'receipt'])->name('receipt');
Route::post('/upload/receipt', [ReceiptController::class,'upload'])->name('upload.receipt');
Route::post('/group', [GroupController::class,'group'])->name('group');
Route::post('/group/refresh', [GroupController::class,'refresh'])->name('refresh');
