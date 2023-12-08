<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\EntrepreneurUser;

use Illuminate\Http\Request;

class PublishController extends Controller
{

    public function index()
    {
        $id = auth()->guard('admin_user')->user()->id;
        $admin = AdminUser::find($id);
        return view('admin.publish.publish', compact('admin'));

    }

    public function show()
    {
        $entrepreneurUser = EntrepreneurUser::all();
        $output = '';
        if ($entrepreneurUser->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table   table-striped table-sm text-center align-middle">

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
                <th>Entrepreneur Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($entrepreneurUser as $register) {
                $statusText = $register->entrepreneur_status == 1 ? '<span class=" badge text-bg-success">Published</span>' : '<span class=" badge text-bg-danger">Not Published</span>';
                    $output .= '<tr>
                        <td>' . $register->id . '</td>
                        <td><img src="storage/images/enterpreneur_images/' . $register->picture . '" width="50" class="rounded-circle"></td>
                        <td>' . $register->ownerName . '</td>
                        <td>' . $register->shopName . '</td>
                        <td>' . $register->location . '</td>
                        <td>' . $register->category . '</td>
                        <td>' . $register->businessReNo . '</td>
                        <td>' . $register->phoneNo . '</td>
                        <td>' . $register->email  . '</td>
                        <td>' . $statusText  . '</td>
                <td>
                <a href="#" id="' . $register->id . '" class="btn btn-primary mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editStatusModal"><i class="bi-pencil-square h6"></i></a>
              </td>
              </tr>';
            }
            $output .= '</tbody></table></div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
		$entrepreneurUser = EntrepreneurUser::find($id);
		return response()->json($entrepreneurUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $entrepreneurUser = EntrepreneurUser::find($request->status_id);
        $entrepreneurUserData = [
            'entrepreneur_status' => $request->entrepreneur_status,
        ];

       $entrepreneurUser->update($entrepreneurUserData);
       return response()->json([
           'status' => 200,
       ]);
    }
}
