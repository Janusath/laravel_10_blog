<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurUser;
use App\Models\ShopBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ShopBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->guard('entrepreneur')->user()->id;
        $user = EntrepreneurUser::find($id);
        return view('entrepreneur.shopBanner.shopBanner', compact('user'));
    }
    public function store(Request $request)
    {
        $businessreno = auth()->guard('entrepreneur')->user()->businessReNo;
        $business_reno=$businessreno;
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/enterpreneur_images', $fileName);

        $bannerData = [

            'description' => $request->description,
            'image' => $fileName,
            'businessReNo' => $business_reno,
        ];
        ShopBanner::create($bannerData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle fetch all eamployees ajax request
    public function show()
    {
        $businessreno = auth()->guard('entrepreneur')->user()->businessReNo;
        // Get events based on the user's businessReNo
        $shopBanner = ShopBanner::where('businessReNo', $businessreno)->get();
        $output = '';
        if ($shopBanner->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table  table-striped table-sm text-center align-middle">

            <thead >
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            $shopBannerCount=1;
            foreach ($shopBanner as $banner) {
                $output .= '<tr>
                <td>' . $shopBannerCount . '</td>
                <td><img src="storage/images/enterpreneur_images/' . $banner->image . '" width="50" class="rounded-circle"></td>
                <td>' . $banner->description . '</td>


                <td>
                  <a href="#" id="' . $banner->id . '" class="btn btn-primary mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editShopBannerModal"><i class="bi-pencil-square h6"></i></a>

                  <a href="#" id="' . $banner->id . '" class="btn btn-danger mx-1 deleteIcon"><i class="bi-trash h6"></i></a>
                </td>
              </tr>';
              $shopBannerCount++;
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
		$banner = ShopBanner::find($id);
		return response()->json($banner);
    }

    /**
     * Update the specified resource in storage.
     */
  	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		$banner = ShopBanner::find($request->banner_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images/enterpreneur_images/', $fileName);
			if ($banner->image) {
				Storage::delete('storage/images/enterpreneur_images/' . $banner->image);
			}
		} else {
			$fileName = $request->banner_image;
		}
        $bannerData = [
            'description' => $request->description,
            'image' => $fileName,
        ];

		$banner->update($bannerData);
		return response()->json([
			'status' => 200,
		]);
	}

    /**
     * Remove the specified resource from storage.
     */
   	// handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$banner = ShopBanner::find($id);
		if (Storage::delete('public/images/enterpreneur_images/' . $banner->image)) {
			ShopBanner::destroy($id);
		}
	}
}
