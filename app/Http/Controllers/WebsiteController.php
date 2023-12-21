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

    public function edit($id)
    {
            $editEvent = Event::find($id);
            return response()->json($editEvent);

    }

    public function edit1($businessReNo)
    {
        try {
            $editEntrepreneurUser = Event::where('businessReNo', $businessReNo)->get();

            dd($editEntrepreneurUser);
            if (!$editEntrepreneurUser) {
                return response()->json(['error' => 'Record not found.']);
            }

            return response()->json($editEntrepreneurUser);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }



    public function event()
    {
        $entrepreneurUsers = EntrepreneurUser::all();
        $events = Event::all();
        return view('website.event',compact('events','entrepreneurUsers'));
    }



    public function contact()
    {
        return view('website.contact');
    }
}
