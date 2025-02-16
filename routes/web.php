<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MVC\Admin\AdminController;
use App\Http\Controllers\MVC\CategoryController;
use App\Http\Controllers\MVC\SubCategoryController;
use App\Http\Controllers\MVC\ProductController;
use App\Http\Controllers\MVC\AdsController;

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
    return redirect()->route('admin.categories');
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

    Route::controller(CategoryController::class)->group(function () {
          // Show All Categories
        Route::get('/admin/categories', 'index')->name('admin.categories');
        Route::get('/admin/add-categories', 'create')->name('admin.categories.create');
        // Store New Category
        Route::post('/admin/categories/store', 'store')->name('admin.categories.store');
        // Edit Category
        Route::get('/admin/categories/edit/{id}', 'edit')->name('admin.categories.edit');
        // Update Category
        Route::put('/admin/categories/update/{id}', 'update')->name('admin.categories.update');
        // Delete Category
        Route::delete('/admin/categories/destroy/{id}', 'destroy')->name('admin.categories.destroy');
    });
    Route::controller(SubCategoryController::class)->group(function () {
         // Show All SubCategories
         Route::get('/admin/subCategories', 'index')->name('admin.subCategories');
         // Store New SubCategory
         Route::post('/admin/subCategories/store', 'store')->name('admin.subCategories.store');
         Route::get('/admin/subCategories/create', 'create')->name('admin.subCategories.create');
         // Edit SubCategory
         Route::get('/admin/subCategories/edit/{id}', 'edit')->name('admin.subCategories.edit');
         // Update SubCategory
         Route::put('/admin/subCategories/update/{id}', 'update')->name('admin.subCategories.update');
         // Delete SubCategory
         Route::delete('/admin/subCategories/destroy/{id}', 'destroy')->name('admin.subCategories.destroy');
    });
    Route::controller(ProductController::class)->group(function () {
         // Show All SubCategories
         Route::get('/admin/products', 'index')->name('admin.products');
         // Store New SubCategory
         Route::post('/admin/products/store', 'store')->name('admin.products.store');
         Route::get('/admin/products/create', 'create')->name('admin.products.create');
         // Edit SubCategory
         Route::get('/admin/products/edit/{id}', 'edit')->name('admin.products.edit');
         // Update SubCategory
         Route::put('/admin/products/update/{id}', 'update')->name('admin.products.update');
         // Delete SubCategory
         Route::delete('/admin/products/destroy/{id}', 'destroy')->name('admin.products.destroy');
    });
    Route::controller(AdsController::class)->group(function () {
         // Show All Ads
         Route::get('/admin/ads', 'index')->name('admin.ads');
         // Store New Ad
         Route::post('/admin/ads/store', 'store')->name('admin.ads.store');
         Route::get('/admin/ads/create', 'create')->name('admin.ads.create');
         // Edit Ad
         Route::get('/admin/ads/edit/{id}', 'edit')->name('admin.ads.edit');
         // Update Ad
         Route::put('/admin/ads/update/{id}', 'update')->name('admin.ads.update');
         // Delete Ad
         Route::delete('/admin/ads/destroy/{id}', 'destroy')->name('admin.ads.destroy');
    });

    // Route::resource('products', ProductController::class);
    // Route::resource('ads', AdsController::class);


});






// Route::middleware('auth:customer')->group(function () {
//     Route::controller(CustomerController::class)->group(function () {
        
//     });
// });


//=====================================================================================>