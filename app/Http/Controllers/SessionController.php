<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();
        
        return redirect('/')->with('success', 'Logout successfull');
    }

    public function create() {
        return view('login');
    }

    public function store() {

        $attributes = request()->validate([
            'name' => ['required', 'exists:users'],
            'password' => ['required']
       ]);
       
       if (auth()->attempt($attributes)) {
            session()->regenerate();
        return redirect('/')->with('success', 'Login successfull');
       }
        return back()->withInput()->withErrors(['password' => 'Wrong password.']);
    }
}
