<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\SubCategoryController;
use App\Http\Controllers\api\AdsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/{subcategoryId}', [ProductController::class, 'index']); // get products for specific subcategory
Route::get('/subCategories/{categoryId}', [SubCategoryController::class, 'index']); // get all subcategories for specific category
Route::get('/categories', [CategoryController::class, 'index']); // get all categories 
Route::get('/ads', [AdsController::class, 'index']); // get all ads

