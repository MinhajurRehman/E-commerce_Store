<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\authcontroller;
use App\Models\Admin;
use App\Models\Cart;
use Illuminate\Http\Request;

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

Route::get('/contact', function () {
    $cartCount = Cart::where("user_id", 1)->count();
    return view('contact', [
        "cartCount" => $cartCount
    ]);
});


Route::get('/product', [homecontroller::class, "search"])->name("product.search");

Route::get('login',[authcontroller::class,'login']);

Route::prefix("admin")->group(function(){

    Route::middleware(["AuthCheckAdmin"])->group(function(){
        Route::get('Dashboard', function () {
            return view('Admin.index');
        })->name("admin.dashboard");


        Route::get('categories', function () {
            return view('Admin.categories');
        });

        Route::get('products', function () {
            return view('Admin.product');
        });

        Route::get('sales', function () {
            return view('Admin.sale');
        });

        Route::get('New-Order', function () {
            return view('Admin.neworder');
        });

        Route::post('categories',[AdminController::class , 'store']);
        Route::post('products',[AdminController::class , 'save']);

        Route::get('Coupon', [AdminController::class , 'coupon']);
        Route::post('Coupon', [AdminController::class , 'couponsave']);
        Route::get('Coupon', [AdminController::class , 'couponshow']);

        Route::get("logout", function (Request $request){
            if (session()->has('LoggedAdmin')) {
                session()->pull("LoggedAdmin");
                return redirect()->route("admin.loginPage")->with('success', 'Logged out Successfully');
            }else{
                return "m";
            }
        })->name("admin.logout");
    });

    Route::middleware(["AlreadyLoggedAdmin"])->group(function(){
        Route::get('login',function(){
            return view("Admin.login");
        })->name("admin.loginPage");

        Route::post('login', function(Request $request){
            $email = $request->input('email');
            $password = $request->input('password');

            // Retrieve the user data from the database
            $admin = Admin::where('email', $email)->first();

            if ($admin) {
                // Verify the password
                if (password_verify($password, $admin->password)) {
                    // Password is correct, create a session and return the user ID
                    session()->put(["LoggedAdmin" => $admin->id]);
                    return redirect()->route("admin.dashboard");
                } else {
                    // Password is incorrect
                    return redirect()->back()->with("fail", "Password is not correct");
                }
            } else {
                // User not found
                return redirect()->back()->with("fail", "Email not Found");
            }
        })->name("admin.login");

    });

});

Route::get('register',[authcontroller::class,'register']);
Route::post('registeruser',[authcontroller::class,'registerUser']);
Route::post('loginuser',[authcontroller::class,'loginUser'])->name('loginuser');
Route::get('logout',[authcontroller::class,'logout']);


Route::get('/shop/{id}', [homecontroller::class, 'Shop'])->name('shop.Buy');

Route::get('/dasboard', function(){
    return view('dashboard');
});

Route::get('/cart', [homecontroller::class, "cart"])->name("cart");
Route::post('/cart/add', [homecontroller::class, "addItemtoCart"])->name('cart.add');
Route::post('/cart/remove', [homecontroller::class, "removeItemFromCart"])->name('cart.remove');
Route::post('/checkout', [homecontroller::class, "checkout"])->name("checkout");

Route::post('/apply_coupon_code',[homecontroller::class , 'apply_coupon_code']);