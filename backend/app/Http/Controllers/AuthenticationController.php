<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function register() {
        return view('users/register');
    }

    public function postRegister(RegistrationRequest $request) {
        $user = new User($request->all());

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('home');
    }

    public function login() {
        return view('users/login');
    }

    public function postLogin(LoginRequest $request) {
        $credentials = $request->except(('_token'));

        if (Auth::attempt($credentials)) {
            return redirect()->route('my_posts');
        } else {
            abort(401);
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
