<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// This Controller manages all CRUD operations around the user.
class UserController extends Controller
{
    //Returns the create view.
    public function create() {
        return view('users.create');
    }

    /*Stores a user with the given data. Validates the data depending on the specific field.
    After successful store the user is logged in and returned to the home screen.*/
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

    /*The user is logged out. His session gets invalidated and the session token regenerated.
    The user is then returned to the home screen.*/
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Sie sind abgemeldet.');
    }

    //The user gets logged in.
    public function login() {
        return view('users.login');
    }

    /*A login attempt gets checked. The given data is compared with the saved data in the DB.
    On success the user is returned to the home screen.*/
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
