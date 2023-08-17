<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

 Auth::routes(['register'=>false]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //category
    Route::get('category-list',[CategoryController::class,'index'])->name('category-list');
    Route::get('category-create',[CategoryController::class,'create'])->name('category-create');
    Route::post('category-store',[CategoryController::class,'store'])->name('category-store');
    Route::get('category-edit/{id}',[CategoryController::class,'edit'])->name('category-edit');
    Route::put('category-update/{id}',[CategoryController::class,'update'])->name('category-update');
    Route::DELETE('category-delete/{id}',[CategoryController::class,'destroy'])->name('category-delete');
    //product
    Route::get('product-list',[ProductController::class,'index'])->name('product-list');
    Route::get('product-create',[ProductController::class,'create'])->name('product-create');
    Route::post('product-store',[ProductController::class,'store'])->name('product-store');
    Route::get('product-edit/{id}',[ProductController::class,'edit'])->name('product-edit');
    Route::put('product-update/{id}',[ProductController::class,'update'])->name('product-update');
    Route::DELETE('product-delete/{id}',[ProductController::class,'destroy'])->name('product-delete');
    




