<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;


use Illuminate\Http\Request;

class AdminAddEntrepreneurUserController extends Controller
{
    public function index()
    {

        $id = auth()->guard('admin_user')->user()->id;
        $admin = AdminUser::find($id);
        return view('admin.adminAddEnterpreneurUser.adminAddEnterpreneurUser', compact('admin'));
    }
}
