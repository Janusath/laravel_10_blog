<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurUser;
use App\Models\Event;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $event = Event::all();
        $entrepreneurUsers = EntrepreneurUser::all();
        return view('website.home',compact('entrepreneurUsers','event'));
    }

    public function event()
    {
        $entrepreneurUsers = EntrepreneurUser::all();
        $event = Event::all();
        return view('website.event',compact('event','entrepreneurUsers'));
    }

    public function contact()
    {
        return view('website.contact');
    }
}
