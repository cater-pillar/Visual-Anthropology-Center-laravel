<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store() {
        
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:3']
        ]);

        $user = User::create($attributes);

        return back()->with('success', 'Account created successfully');
    }

    public function create() {
        return view('register-page');
    }
}
