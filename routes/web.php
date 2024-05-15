<?php

use App\Http\Controllers\TempelateController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
// admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [adminController::class, 'index'])->name('admin')->middleware('Admin');
    Route::get('/prod', [adminController::class, 'adminproduct'])->name('adminproduct');
    Route::get('/customers', [adminController::class, 'customers'])->name('customers');
    Route::get('/orders', [adminController::class, 'orders'])->name('orders');
});
Route::post('/addnewproduct', [adminController::class, 'addnewproduct'])->name('addnewproduct');
Route::post('/updateproduct', [adminController::class, 'updateproduct'])->name('updateproduct');
Route::get('/deleteproduct/{id}', [adminController::class, 'deleteproduct'])->name('deleteproduct');
Route::get('/changeuserstatus/{status}/{id}', [adminController::class, 'changestatus'])->name('changestatus');
Route::get('/orderitems', [adminController::class, 'orderitems'])->name('orderitems');

// home page store front
Route::get('/',[TempelateController::class ,'index'])->name('index');
Route::get('/about',[TempelateController::class ,'about'])->name('about');
Route::get('/contact',[TempelateController::class ,'contact'])->name('contact');
Route::get('/products',[TempelateController::class ,'products'])->name('products');
Route::get('/cart',[TempelateController::class ,'cart'])->name('cart');
Route::get('/singleproduct/{id}',[TempelateController::class ,'singleproduct'])->name('singleproduct');
Route::post('/addtocart',[TempelateController::class ,'addtocart'])->name('addtocart');
Route::get('/deletecartitem/{id}',[TempelateController::class ,'deletecartitem'])->name('deletecartitem');
Route::post('/updatecartitem',[TempelateController::class ,'updatecartitem'])->name('updatecartitem');
Route::get('/signup',[TempelateController::class ,'signup'])->name('signup');
Route::get('/checkout',[TempelateController::class ,'checkout'])->name('checkout');
Route::get('/myorders',[TempelateController::class ,'myorders'])->name('myorders');

Auth::routes();

// stripe
Route::controller(stripeController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
