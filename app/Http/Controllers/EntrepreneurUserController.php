<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\EntrepreneurUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

    public function login_user(Request $request)
    {
        $request->validate([
            'businessReNo' => 'required',
            'password' => 'required',
        ]);

        $businessReNo = $request->input('businessReNo');
        $password = $request->input('password');

        // Attempt to authenticate using the 'entrepreneur' guard
        if (Auth::guard('entrepreneur')->attempt(['businessReNo' => $businessReNo, 'password' => $password])) {
            $entrepreneurUser = EntrepreneurUser::where('businessReNo', $businessReNo)->first();
            Auth::guard('entrepreneur')->login($entrepreneurUser);
            $this->showSweetAlert('success', 'Login Successful', 'Successfully Logined');
            return redirect('entrepreneur_dashboard');
        } else {
            return back()->withErrors(['login' => 'Invalid credentials. Please try again.']);
        }
    }

            public function logout()
        {
            auth()->guard('entrepreneur')->logout();

            $this->showSweetAlert('success', 'Logout Successful', 'Successfully Logout');
            return redirect('/entrepreneur_login');
        }

        public function entrepreneur_profile()
        {
            $id = auth()->guard('entrepreneur')->user()->id;
            $user = EntrepreneurUser::find($id);
            return view('entrepreneur.profile.profile', compact('user'));
        }

        public function entrepreneur_profile_update(Request $request)
        {
            $id = auth()->guard('entrepreneur')->user()->id;
            $data = EntrepreneurUser::find($id);
            $data->ownerName = $request->ownerName;
            $data->shopName = $request->shopName;
            $data->location = $request->location;
            $data->phoneNo = $request->phoneNo;
            $data->email = $request->email;

            if ($request->file('picture')) {
                $file = $request->file('picture');
                $filename = now()->format('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images/enterpreneur_images/'), $filename);
                $data['picture'] = $filename;
            }

            $data->save();
            return redirect('/entrepreneur_profile');
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
