<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurUser;
use App\Models\Event;
use App\Models\Production;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $events = Event::all();
        $productions = Production::all();
        $timeSlots = TimeSlot::all();
        $entrepreneurUsers = EntrepreneurUser::all();
        return view('website.home',compact('entrepreneurUsers','events','productions','timeSlots'));
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
