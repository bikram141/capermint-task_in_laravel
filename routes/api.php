<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\api\PostController;
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
Route::post('/signup','Api\LoginController@register');
Route::post('/signin','Api\LoginController@login');
Route::get('/category-list','Api\CategoryController@index');
Route::get('/category_product','Api\CategoryController@category_product');
Route::post('/product/search','Api\PostController@search');
route::get('/product/{id}','Api\PostController@show');




