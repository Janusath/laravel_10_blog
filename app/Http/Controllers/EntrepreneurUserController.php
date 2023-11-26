<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\EntrepreneurUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EntrepreneurUserController extends Controller
{
    public function register()
    {
        return view('entrepreneur.register');
    }
    public function login()
    {
        return view('entrepreneur.login');
    }

    public function register_user(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:entrepreneur_users,email',
        'businessReNo' => 'required|unique:entrepreneur_users,businessReNo',
        'password' => 'required',
    ]);

        // If validation fails, redirect back with error messages and input data
        if ($validator->fails()) {
            return redirect()->route('entrepreneur_register')->withErrors($validator)->withInput();
      
        }

        $registerData =$request->all() ;
        EntrepreneurUser::create($registerData);
        $this->showSweetAlert('success', 'Register Successful', 'Successfully Registered');
        return view('entrepreneur.login');

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
