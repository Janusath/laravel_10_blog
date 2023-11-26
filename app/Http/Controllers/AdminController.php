<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_dashboard');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function login()
    {
        return view('admin.login');
    }
}
