<?php

namespace App\Http\Controllers\API;

use App\Events\UserDataUpdated;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function index()
    {
        $users = User::paginate(10);

        // Broadcast the user data using the UserDataUpdated event
        // broadcast(new UserDataUpdated($users))->toOthers();

        return response()->json($users);
    }
    public function show($user)
    {
        $user = User::find($user);
        return response()->json($user);
    }


    public function triggerEvent()
    {
        $users = User::all();

        // Dispatch the UserDataUpdated event
        event(new UserDataUpdated($users));

        return response()->json(['message' => 'Event dispatched successfully']);
    }
}
