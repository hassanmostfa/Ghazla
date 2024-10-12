<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MVC\Admin\AdminController;
use App\Http\Controllers\MVC\Seller\SellerController;
use App\Http\Controllers\MVC\Customers\CustomerController;
use App\Http\Controllers\OTPController;

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
    return view('home');
})->name('home');

// OTP Routes
Route::controller(OTPController::class)->group(function () {
    Route::post('/send-otp','sendOtp')->name('send.otp'); // Send OTP
    Route::post('/verify-otp','verifyOtp')->name('verify.otp'); // Verify OTP
});


//=====================================================================================>
// Admin Routes
//=====================================================================================>
Route::controller(AdminController::class)->group(function () {
    // Show Login Page
    Route::get('/admin/login', 'LoginPage')->name('admin.loginPage');
    // Admin Login Action
    Route::post('/admin/loginAction', 'AdminLogin')->name('admin.login');
});

Route::middleware('auth:admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        // Admin Dashboard
        Route::get('/admin/dashboard', 'adminDashboard')->name('admin.dashboard');
        // Admin Logout
        Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
    });
});


//=====================================================================================>


//=====================================================================================>
// Seller Routes
//=====================================================================================>
Route::controller(SellerController::class)->group(function () {
    // Show Register Page
    Route::get('/seller/register', 'sellerRegisterPage')->name('seller.registerPage');
    // Register Action
    Route::post('/seller/registerAction', 'registerSeller')->name('seller.register');
    // Show Login Page
    Route::get('/seller/login', 'sellerLoginPage')->name('seller.loginPage');
    // Login Action
    Route::post('/seller/loginAction', 'sellerLogin')->name('seller.login');

});

Route::middleware('auth:seller')->group(function () {
    Route::controller(SellerController::class)->group(function () {
        // Seller Dashboard
        Route::get('/seller/dashboard', 'sellerDashboard')->name('seller.dashboard');
    });
});

//=====================================================================================>

//=====================================================================================>
// Customer Routes
//=====================================================================================>
Route::controller(CustomerController::class)->group(function () {
    // Show Register Page
    Route::get('/customer/register', 'customerRegisterPage')->name('customer.registerPage');
    // Register Action
    Route::post('/customer/registerAction', 'registerCustomer')->name('customer.register');
    // Show Login Page
    Route::get('/customer/login', 'customerLoginPage')->name('customer.loginPage');
    // Login Action
    Route::post('/customer/loginAction', 'customerLogin')->name('customer.login');
});

// Route::middleware('auth:customer')->group(function () {
//     Route::controller(CustomerController::class)->group(function () {
        
//     });
// });


//=====================================================================================>