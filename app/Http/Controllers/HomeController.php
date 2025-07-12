<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    function index() {
        return view('pages.home', ['username' => Auth::user()->full_name, 'is_admin' => Auth::user()->role == 'ADMIN']);
    }
}
