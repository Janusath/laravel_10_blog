<?php

namespace App\Http\Controllers;

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
        //
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
        //
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
