<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $id = auth()->guard('admin_user')->user()->id;
        $admin = AdminUser::find($id);
        return view('admin.event.event', compact('admin'));

    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $business_reno=5;
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/admin_images', $fileName);

        $eventData = [

            'title' => $request->title,
            'subTitle' => $request->subTitle,
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $fileName,
            'businessReNo' => $business_reno,
        ];
        Event::create($eventData);
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $events = Event::all();
        $output = '';
        if ($events->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table  table-striped table-sm text-center align-middle">

            <thead >
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Description</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($events as $event) {
                $output .= '<tr>
                <td>' . $event->id . '</td>
                <td><img src="storage/images/admin_images/' . $event->image . '" width="50" class="rounded-circle"></td>
                <td>' . $event->title . '</td>
                <td>' . $event->subTitle . '</td>
                <td>' . $event->author . '</td>
                <td>' . $event->category . '</td>
                <td>' . $event->description . '</td>
                <td>' . $event->created_at . '</td>


                <td>
                  <a href="#" id="' . $event->id . '" class="btn btn-primary mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEventModal"><i class="bi-pencil-square h6"></i></a>

                  <a href="#" id="' . $event->id . '" class="btn btn-danger mx-1 deleteIcon"><i class="bi-trash h6"></i></a>
                </td>
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
    public function edit(Request $request)
    {
        $id = $request->id;
		$event = Event::find($id);
		return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
  	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		$event = Event::find($request->event_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images/admin_images/', $fileName);
			if ($event->image) {
				Storage::delete('public/images/admin_images/' . $event->image);
			}
		} else {
			$fileName = $request->event_image;
		}
        $eventData = [

            'title' => $request->title,
            'subTitle' => $request->subTitle,
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $fileName,
        ];

		$event->update($eventData);
		return response()->json([
			'status' => 200,
		]);
	}
    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request) {
		$id = $request->id;
		$event = Event::find($id);
		if (Storage::delete('public/images/admin_images/' . $event->image)) {
			Event::destroy($id);
		}
	}
}
