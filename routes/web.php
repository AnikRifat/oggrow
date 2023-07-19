<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::middleware('auth:api')->group(function () {
    Route::get('users', 'UserController@index');
    Route::get('users/{user}', 'UserController@show');
    // Other API routes for users if needed
});
