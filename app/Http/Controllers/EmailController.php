<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->guard('admin_user')->user()->id;
        $admin = AdminUser::find($id);
        return view('website.emailView', compact('admin'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $insertRecord = new Email;
        $insertRecord ->name = trim($request->name);
        $insertRecord ->subject = trim($request->subject);
        $insertRecord ->email = trim($request->email);
        $insertRecord ->phoneNo = trim($request->phoneNo);
        $insertRecord ->message = trim($request->message);
        $insertRecord ->save();
        Mail::to('mohamedahshan0056@gmail.com')->send(new ContactFormMail($request));
        return redirect()->back()->with('success', 'Your Email submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Email $email)
    {
        $emails = Email::all();
        $output = '';
        if ($emails->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table table-striped table-sm text-center align-middle">

            <thead >
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Message</th>

              </tr>
            </thead>
            <tbody>';
            foreach ($emails as $email) {
                $output .= '<tr>
                <td>' . $email->id . '</td>
                <td>' . $email->name . '</td>
                <td>' . $email->subject . '</td>
                <td>' . $email->email . '</td>
                <td>' . $email->phoneNo . '</td>
                <td>' . $email->message . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        //
    }
}
