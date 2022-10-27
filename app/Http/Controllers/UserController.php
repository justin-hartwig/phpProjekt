<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $formData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6|max:255'
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/')->with('message', 'Sie wurden registriert und angemeldet.');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Sie sind abgemeldet.');
    }

    public function login(Request $request) {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $formData = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formData)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Sie sind angemeldet.');
        }

        return back()->withErrors(['email' => 'Falsche Zugangsdaten!'])->onlyInput('email');
    }
}
