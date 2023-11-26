<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function index()
    {
        return view('entrepreneur.entrepreneur_dashboard');
    }
    public function register()
    {
        return view('entrepreneur.register');
    }
    public function login()
    {
        return view('entrepreneur.login');
    }
}
