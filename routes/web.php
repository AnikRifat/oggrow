<?php

use App\Events\UserDataUpdated;
use App\Models\User;
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
    $users = User::Paginate(10);
    return view('index', compact('users'));
});

Route::get('/test', function () {
    $users = User::Paginate(10);
    return view('test', compact('users'));
});

Route::get('/triggerEvent', function () {
    $users = User::take(10);

    // Dispatch the UserDataUpdated event
    event(new UserDataUpdated($users));

    return response()->json(['message' => 'Event dispatched successfully']);
});
