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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'user',
   // 'middleware' => 'jwt.verify',
], function () {
    Route::get('create', 'UserDetailsController@createUserDetails');
    Route::post('update', 'UserDetailsController@updateUserDetails');
    Route::post('select', 'UserDetailsController@selectUserDetails');
    Route::post('delete', 'UserDetailsController@deleteUserDetails');
});
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'user',
   // 'middleware' => 'jwt.verify',
], function () {
    Route::post('register', 'UserController@UserDetails');
   Route::post('updateuser', 'UserController@updateUser');
  // Route::post('', 'UserController@updateUser');
});