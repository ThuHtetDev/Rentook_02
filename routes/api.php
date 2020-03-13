<?php

use Illuminate\Http\Request;
use App\Product;
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

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::apiResource('/product', 'API\ProductController');
Route::apiResource('/book', 'API\BookController');
Route::apiResource('/users', 'API\UserController');
Route::get('/users/{id}/books','API\UserController@getUserBook')->name('getUserBooks');
Route::get('/users/{id}/books/{book_id}','API\UserController@getUserBookDetail')->name('getUserBooksDetail');