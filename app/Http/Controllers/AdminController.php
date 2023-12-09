<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Email;
use App\Models\EntrepreneurUser;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['TotalAdminCount'] = AdminUser::count();
        $data['TotalEventCount'] = Event::count();
        $data['TotalEmailCount'] = Email::count();
        $data['TotalEntrepreneurUserCount'] = EntrepreneurUser::count();
        $data['entrepreneur_status'] = EntrepreneurUser::where('entrepreneur_status', 1)->count();

        $id = auth()->guard('admin_user')->user()->id;
        $admin = AdminUser::find($id);
        return view('admin.admin_dashboard', compact('admin', 'data'));
    }



}
