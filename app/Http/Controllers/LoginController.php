<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return view('pages.login');
    }

    public function store(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect(route('login.index'))->with(['error' => 'Email atau password salah!']);
        }

        $request->session()->regenerate();
        return redirect(route('dashboard'));
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        return redirect(route('login.index'));
    }
}
