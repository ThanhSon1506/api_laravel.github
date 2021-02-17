<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories','Api\CategoriesController@Category');
Route::get('categories/{id}','Api\CategoriesController@CategoryById');
Route::post('categories','Api\CategoriesController@CategorySave');
Route::put('categories/{id}','Api\CategoriesController@CategoryUpdate');
Route::delete('categories/{id}','Api\CategoriesController@CategoryDelete');

Route::get('baiviets','Api\BaivietsController@Baiviet');
Route::get('baiviets/category/{id}','Api\BaivietsController@BaivietByCategory');
Route::get('baiviets/random','Api\BaivietsController@Random');
Route::get('baiviets/{id}','Api\BaivietsController@BaivietById');
Route::post('baiviets','Api\BaivietsController@BaivietSave');
Route::put('baiviets/{id}','Api\BaivietsController@BaivietUpdate');
Route::delete('baiviets/{id}','Api\BaivietsController@BaivietDelete');

Route::get('vungmiens','Api\VungmiensController@Vungmiens');
Route::get('vungmiens/{id}','Api\VungmiensController@VungmiensById');
Route::post('vungmiens','Api\VungmiensController@VungmiensSave');
Route::put('vungmiens/{id}','Api\VungmiensController@VungmiensUpdate');
Route::delete('vungmiens/{id}','Api\VungmiensController@VungmiensDelete');

//Route::apiResource('categories','Api\Categories');
//Route::apiResource('baiviets','Api\BaivietsApi');
//Route::apiResource('vungmiens','Api\VungmiensApi');
//Route::get('categories/{id}','Api\CategoriesController@CategoryById');
//Route::apiResource('nguoidungs','Api\NguoidungsApi');
Route::get('nguoidungs/swap/{id}','Api\NguoidungController@Swap');
Route::get('nguoidungs/{id}','Api\NguoidungController@NguoidungById');	
Route::get('nguoidungs/{ten}','Api\NguoidungController@NguoidungByTen');	
Route::get('nguoidungs','Api\NguoidungController@Nguoidung');
Route::post('nguoidungs','Api\NguoidungController@NguoidungSave');	