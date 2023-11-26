<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
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


    public function register_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|confirmed',
        ]);


        // If validation fails, redirect back with error messages and input data
        if ($validator->fails()) {
            return redirect()->route('admin_register')->withErrors($validator)->withInput();
        }

        $registerData = $request->all();
        $user = AdminUser::create($registerData);
        Auth::login($user);
        $this->showSweetAlert('success', 'Register Successful', 'Successfully Registered');
        return view('admin.login');

    }

    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $adminUser = AdminUser::where('email', $email)->first();
            Auth::login($adminUser);
            $this->showSweetAlert('success', 'Login Successful', 'Successfully Logined');
            return redirect('admin_dashboard');
        } else {
            return back()->withErrors(['login' => 'Invalid credentials. Please try again.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin_login');
    }

       // Helper method to show SweetAlert notification
       private function showSweetAlert($type, $title, $message, $timer = 3000)
       {
           $alert = [
               'type' => $type,
               'title' => $title,
               'text' => $message,
               'timer' => $timer,
               'timerProgressBar' => true,
           ];

           Session::flash('sweet_alert', $alert);
       }

}
