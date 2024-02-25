<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\authcontroller;
use App\Models\Cart;

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

Route::get('/',[homecontroller::class, 'view']);

Route::get('/cart', [homecontroller::class, "cart"])->name("cart");
Route::post('/cart/add', [homecontroller::class, "addItemtoCart"])->name('cart.add');
Route::post('/cart/remove', [homecontroller::class, "removeItemFromCart"])->name('cart.remove');
Route::post('/checkout', [homecontroller::class, "checkout"])->name("checkout");

Route::get('/contact', function () {
    $cartCount = Cart::where("user_id", 1)->count();
    return view('contact', [
        "cartCount" => $cartCount
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('login',[authcontroller::class,'login']);
Route::get('register',[authcontroller::class,'register']);
Route::post('registeruser',[authcontroller::class,'registerUser']);
Route::post('loginuser',[authcontroller::class,'loginUser'])->name('loginuser');
Route::get('logout',[authcontroller::class,'logout']);


Route::get('/Admin/Dashboard', function () {
    return view('Admin.index');
});

Route::get('/Admin/categories', function () {
    return view('Admin.categories');
});

Route::get('/Admin/products', function () {
    return view('Admin.product');
});

Route::get('/Admin/sales', function () {
    return view('Admin.sale');
});

Route::get('/Admin/New-Order', function () {
    return view('Admin.neworder');
});


Route::post('/Admin/categories',[AdminController::class , 'store']);
Route::post('/Admin/products',[AdminController::class , 'save']);

Route::get('/shop/{id}', [homecontroller::class, 'Shop'])->name('shop.Buy');

Route::get('/Admin/Coupon', [AdminController::class , 'coupon']);
Route::post('/Admin/Coupon', [AdminController::class , 'couponsave']);
Route::get('/Admin/Coupon', [AdminController::class , 'couponshow']);