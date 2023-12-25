<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurUser;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->guard('entrepreneur')->user()->id;
        $user = EntrepreneurUser::find($id);
        return view('entrepreneur.timeSlot.timeSlot', compact('user'));
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
        $businessreno = auth()->guard('entrepreneur')->user()->businessReNo;
        $business_reno=$businessreno;

        $timeSlotData = [
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday,
            'businessReNo' => $business_reno,
        ];
        TimeSlot::create($timeSlotData);
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeSlot $timeSlot)
    {
        $businessreno = auth()->guard('entrepreneur')->user()->businessReNo;
        // Get events based on the user's businessReNo
        $timeSlot = TimeSlot::where('businessReNo', $businessreno)->get();
        $output = '';
        if ($timeSlot->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table table-striped table-sm text-center align-middle">

            <thead >
              <tr>
                <th>ID</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            $timeSlotCount=1;
            foreach ($timeSlot as $time_slot) {
                $output .= '<tr>
                <td>' . $timeSlotCount . '</td>
                <td>' . $time_slot->monday . '</td>
                <td>' . $time_slot->tuesday . '</td>
                <td>' . $time_slot->wednesday . '</td>
                <td>' . $time_slot->thursday . '</td>
                <td>' . $time_slot->friday . '</td>
                <td>' . $time_slot->saturday . '</td>
                <td>' . $time_slot->sunday . '</td>
                <td>
                  <a href="#" id="' . $time_slot->id . '" class="btn btn-primary mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editTimeSlotModal"><i class="bi-pencil-square h6"></i></a>
                  <a href="#" id="' . $time_slot->id . '" class="btn btn-danger mx-1 deleteIcon"><i class="bi-trash h6"></i></a>
                </td>
              </tr>';
              $timeSlotCount++;
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
    public function edit(Request $request)
    {
        $id = $request->id;
		$timeSlot = TimeSlot::find($id);
		return response()->json($timeSlot);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $timeSlot = TimeSlot::find($request->time_slot_id);
        $timeSlotData = [
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday,
        ];

       $timeSlot->update($timeSlotData);
       return response()->json([
           'status' => 200,
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
		$timeSlot = TimeSlot::find($id);
		TimeSlot::destroy($id);
    }
}
