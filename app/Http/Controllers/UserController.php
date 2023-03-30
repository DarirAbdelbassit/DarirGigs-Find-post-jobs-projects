<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // to display register form
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $req)
    {
        //validate the form
        $userData = $req->validate([
            'name' => ['required','min:3'],
            'email'=> ['required','email',Rule::unique('users', 'email')],
            'password'=>['required','min:6','confirmed']
        ]);
        //encrypt the password
        $userData['password'] = bcrypt($userData['password']);
        //create user
        $user = User::create($userData);
        //login
        auth()->login($user);
        //redirect to home page
        return redirect('/')->with('message', 'your successfully logged in');
    }
    // logout method
    public function logout(Request $req)
    {
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logout');
    }
    public function login()
    {
        return view('users.login');
    }
    public function loginHandler(Request $req)
    {
        $loginData=$req->validate([
            'email'=>['required',"email"],
            'password'=>'required'
        ]);
        if (auth()->attempt($loginData)) {
            $req->session()->regenerate();
            return redirect('/')->with('message', 'You are now Logged in');
        }
        return back()->with('message', 'Invalid email or password');
    }
}
