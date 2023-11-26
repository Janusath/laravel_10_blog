<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        'password' => 'required',
    ]);

        // If validation fails, redirect back with error messages and input data
        if ($validator->fails()) {
            return redirect()->route('admin_register')->withErrors($validator)->withInput();
      
        }

        $registerData =$request->all() ;
        AdminUser::create($registerData);
        $this->showSweetAlert('success', 'Register Successful', 'Successfully Registered');
        return view('admin.login');

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
