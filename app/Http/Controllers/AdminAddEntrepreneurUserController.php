<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\EntrepreneurUser;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AdminAddEntrepreneurUserController extends Controller
{
    public function index()
    {

        $id = auth()->guard('admin_user')->user()->id;
        $admin = AdminUser::find($id);
        return view('admin.adminAddEnterpreneurUser.adminAddEnterpreneurUser', compact('admin'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ownerName' => 'required',
            'shopName' => 'required',
            'location' => 'required',
            'category' => 'required',
            'businessReNo' => 'required|unique:entrepreneur_users,businessReNo',
            'email' => 'required|email|unique:entrepreneur_users,email',
            'phoneNo' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        // If validation fails, redirect back with error messages and input data

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }


        // If validation passes, proceed with creating the user
        $registerData = [
            'ownerName' => $request->ownerName,
            'shopName' => $request->shopName,
            'location' => $request->location,
            'category' => $request->category,
            'businessReNo' => $request->businessReNo,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
            'password' => $request->password,
            'confirmPassword' => $request->confirmPassword,
            'entrepreneur_status' => '0', //default value
        ];

        EntrepreneurUser::create($registerData);
            return response()->json([
                'status' => 200,
            ]);
    }

    public function show()
    {
        $entrepreneurUser = EntrepreneurUser::all();
        $output = '';
        if ($entrepreneurUser->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table table-striped table-sm text-center align-middle">

            <thead >
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>owner Name</th>
                <th>Shop Name</th>
                <th>Location</th>
                <th>Category</th>
                <th>Business ReNo</th>
                <th>Phone No</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($entrepreneurUser as $register) {
                $output .= '<tr>
                <td>' . $register->id . '</td>
                <td><img src="/public/images/enterpreneur_images/' . $register->picture . '" width="50" class="img-thumbnail "></td>
                <td>' . $register->ownerName . '</td>
                <td>' . $register->shopName . '</td>
                <td>' . $register->location . '</td>
                <td>' . $register->category . '</td>
                <td>' . $register->businessReNo . '</td>
                <td>' . $register->phoneNo . '</td>
                <td>' . $register->email  . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }
}
