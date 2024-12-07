<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.sliders', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:1,0',
            'primary_button_text' => 'nullable|string|max:255',
            'primary_button_link' => 'nullable|url|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|url|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = new Slider();
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->status = $validatedData['status'];
        $slider->primary_button_text = $validatedData['primary_button_text'];
        $slider->primary_button_link = $validatedData['primary_button_link'];
        $slider->secondary_button_text = $validatedData['secondary_button_text'];
        $slider->secondary_button_link = $validatedData['secondary_button_link'];
        $slider->save();

        if ($validatedData['status'] == 1) {
            $slider['status'] = $validatedData['status'];
        }

         if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('img/');
                $image->move($imagePath, $filename);
                $slider->update(['slider_img' => $filename]);
            }
        }
        return redirect()->route('sliders')->with('success', 'Slider added successfully');
    }

    public function edit(Slider $slider)
    {
        $images = $slider->images;
        return view('sliders.edit', compact('slider','images'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:1,0',
            'primary_button_text' => 'nullable|string|max:255',
            'primary_button_link' => 'nullable|url|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|url|max:255',
            'slider_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->primary_button_text = $validatedData['primary_button_text'];
        $slider->primary_button_link = $validatedData['primary_button_link'];
        $slider->secondary_button_text = $validatedData['secondary_button_text'];
        $slider->secondary_button_link = $validatedData['secondary_button_link'];
        $slider->status = $validatedData['status'];

        if ($request->hasFile('slider_img')) {
            if ($slider->slider_img) {
                $oldImagePath = public_path('img/' . $slider->slider_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('slider_img');
            $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/');
            $image->move($imagePath, $filename);
            $slider->slider_img = $filename;
        }

        $slider->save();

        return redirect()->route('sliders')->with('success', 'Slider updated successfully');
    }


    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('sliders')->with('success', 'Slider deleted successfully');
    }

    public function deleteImage($imageId)
    {
        $slider = Slider::find($imageId);

        if (!$slider) {
            return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
        }

        $filename = $slider->slider_img;
        $imagePath = public_path('img/' . $filename);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->slider_img = null;
        $slider->save();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully'], 200);
    }

    

}
