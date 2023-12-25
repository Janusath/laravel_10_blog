<?php

namespace App\Http\Controllers;
use App\Models\EntrepreneurUser;
use App\Models\Production;
use App\Models\ShopBanner;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function index()
    {
        $id = auth()->guard('entrepreneur')->user()->id;
        $user = EntrepreneurUser::find($id);

        $business_reno = auth()->guard('entrepreneur')->user()->businessReNo;

        $data['TotalShopBannerCount'] = ShopBanner::where('businessReNo', $business_reno)->count();
        $data['TotalProductionCount'] = Production::where('businessReNo', $business_reno)->count();
        $data['TotalTimeSlotCount'] = TimeSlot::where('businessReNo', $business_reno)->count();

        return view('entrepreneur.entrepreneur_dashboard', compact('user','data'));




    }
}
