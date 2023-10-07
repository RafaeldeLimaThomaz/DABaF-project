<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function getUserForm() {
        return view('userForm');
    }

    public function store(CreateUserRequest $request) {

        $data = $request->validated();
        User::create($data);
        return redirect()->route('user.all');
    }

    public function all() {
        $users = User::all(); 
        return view('allUsers', compact('users')); 
    }
}
