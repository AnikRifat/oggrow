<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::take(10)->get();
        return view('index', compact('users'));
    }


    public function show($user)
    {
        $user = User::find($user);
        return view('index', compact('user'));
    }
}
