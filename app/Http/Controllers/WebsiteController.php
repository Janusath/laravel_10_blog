<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function website()
    {
        $event = Event::all();
        return view('website.website',compact('event'));
    }

    public function contact()
    {
        return view('website.contact');
    }
}
