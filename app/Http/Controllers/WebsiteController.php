<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurUser;
use App\Models\Event;
use App\Models\Production;
use App\Models\ShopBanner;
use App\Models\TimeSlot;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(Request $request)
    {

        $events = Event::paginate(2 ,['*'], 'page1');
        $productions = Production::all();
        $timeSlots = TimeSlot::all();
        $entrepreneurUsers = EntrepreneurUser::paginate(3 ,['*'], 'page2');
        $ShopBanners = ShopBanner::all();

        return view('website.home',compact('entrepreneurUsers','events','productions','timeSlots','ShopBanners'));
    }

    public function shop(Request $request)
    {

        $events = Event::paginate(2 ,['*'], 'page1');
        $productions = Production::all();
        $timeSlots = TimeSlot::all();
        $entrepreneurUsers = EntrepreneurUser::paginate(3 ,['*'], 'page2');
        $ShopBanners = ShopBanner::all();

        return view('website.shop',compact('entrepreneurUsers','events','productions','timeSlots','ShopBanners'));
    }

    public function edit($id)
    {
            $editEvent = Event::find($id);
            return response()->json($editEvent);

    }

    public function edit1($businessReNo)
    {
        try {

            $editEntrepreneurUser = EntrepreneurUser::where('businessReNo', $businessReNo)->get();

            if (!$editEntrepreneurUser) {
                return response()->json(['error' => 'Record not found.']);
            }

            return response()->json($editEntrepreneurUser);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function edit2($businessReNo)
    {
        try {
            $editProductions = Production::where('businessReNo', $businessReNo)->get();

            if (!$editProductions) {
                return response()->json(['error' => 'Record not found.']);
            }

            return response()->json($editProductions);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit3($businessReNo)
    {
        try {
            $editTimeSlots = TimeSlot::where('businessReNo', $businessReNo)->get();

            if (!$editTimeSlots) {
                return response()->json(['error' => 'Record not found.']);
            }

            return response()->json($editTimeSlots);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit4($businessReNo)
    {
        try {
            $editShopBanners = ShopBanner::where('businessReNo', $businessReNo)->get();

            if (!$editShopBanners) {
                return response()->json(['error' => 'Record not found.']);
            }

            return response()->json($editShopBanners);
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

    public function about()
    {
        return view('website.about');
    }
}
