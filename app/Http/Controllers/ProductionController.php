<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurUser;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->guard('entrepreneur')->user()->id;
        $user = EntrepreneurUser::find($id);
        return view('entrepreneur.production.production', compact('user'));
    }

    public function store(Request $request)
    {
        $value=5;
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/enterpreneur_images', $fileName);

        $productData = [
            'name' => $request->name,
            'category' => $request->category,
            'details' => $request->details,
            'image' => $fileName,
            'businessReNo' => $value,
        ];
        Production::create($productData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle fetch all eamployees ajax request
    public function show()
    {
        $production = Production::all();
        $output = '';
        if ($production->count() > 0) {
            $output .= ' <div class="table-responsive"> <table class="table table-striped table-sm text-center align-middle">

            <thead >
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>details</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($production as $product) {
                $output .= '<tr>
                <td>' . $product->id . '</td>
                <td><img src="storage/images/enterpreneur_images/' . $product->image . '" width="50" class="rounded-circle"></td>
                <td>' . $product->name . '</td>
                <td>' . $product->category . '</td>
                <td>' . $product->details . '</td>
                <td>
                  <a href="#" id="' . $product->id . '" class="btn btn-primary mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editProductModal"><i class="bi-pencil-square h6"></i></a>

                  <a href="#" id="' . $product->id . '" class="btn btn-danger mx-1 deleteIcon"><i class="bi-trash h6"></i></a>
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
		$product = Production::find($id);
		return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
  	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		$product = Production::find($request->product_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images/enterpreneur_images/', $fileName);
			if ($product->image) {
				Storage::delete('public/images/enterpreneur_images/' . $product->image);
			}
		} else {
			$fileName = $request->product_image;
		}

        $productData = [
            'name' => $request->name,
            'category' => $request->category,
            'details' => $request->details,
            'image' => $fileName,
        ];

		$product->update($productData);
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
		$product = Production::find($id);
		if (Storage::delete('public/images/enterpreneur_images/' . $product->image)) {
			Production::destroy($id);
		}
	}
}
