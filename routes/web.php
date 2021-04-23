<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SizesController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function () {
    // CATEGORY
    Route::resource('categories', CategoriesController::class);
    Route::get('/api/categories', [CategoriesController::class, 'getCategoriesJson']);
    // BRANDS
    Route::resource('brands', BrandsController::class);
    Route::get('/api/brands', [BrandsController::class, 'getBrandsJson']);
    // SIZE
    Route::resource('sizes', SizesController::class);
    Route::get('/api/sizes', [SizesController::class, 'getSizesJson']);
    // PRODUCT
    Route::resource('products', ProductsController::class);
});
