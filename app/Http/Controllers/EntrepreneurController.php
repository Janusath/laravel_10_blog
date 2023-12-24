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
        $data['TotalShopBannerCount'] = ShopBanner::count();
        $data['TotalProductionCount'] = Production::count();
        $data['TotalTimeSlotCount'] = TimeSlot::count();

        $id = auth()->guard('entrepreneur')->user()->id;
        $user = EntrepreneurUser::find($id);
        return view('entrepreneur.entrepreneur_dashboard', compact('user','data'));

    }
}
