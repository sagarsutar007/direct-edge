<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedbacks.feedbacks', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedbacks.new-feedback');
    }

    public function store(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        'description' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'approved' => 'required|in:1,0',
    ]);


    if ($request->hasFile('profile_img')) {
        $image = $request->file('profile_img');
        $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('assets/uploads/');
        $image->move($imagePath, $filename);
    } else {
        return redirect()->back()->with('error', 'Image upload failed.');
    }


    $feedback = new Feedback();
    $feedback->name = $validatedData['name'];
    $feedback->designation = $validatedData['designation'];
    $feedback->company = $validatedData['company'];
    $feedback->profile_img = $filename; 
    $feedback->description = $validatedData['description'];
    $feedback->rating = $validatedData['rating'];
    $feedback->approved = $validatedData['approved'];
    $feedback->save();


    return redirect()->route('feedbacks')->with('success', 'Feedback added successfully.');
}


    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit-feedbacks', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
{

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'description' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'approved' => 'required|in:1,0',
    ]);


    $feedback->update([
        'name' => $validatedData['name'],
        'designation' => $validatedData['designation'],
        'company' => $validatedData['company'],
        'description' => $validatedData['description'],
        'rating' => $validatedData['rating'],
        'approved' => $validatedData['approved'],
    ]);


    if ($request->hasFile('profile_img') && $request->file('profile_img')->isValid()) {

        if ($feedback->profile_img) {
            Storage::delete('assets/uploads/' . $feedback->profile_img);
        }

        $image = $request->file('profile_img');
        $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('assets/uploads/');
        $image->move($imagePath, $filename);
        $feedback->profile_img = $filename;
    }


    $feedback->save();


    return redirect()->route('feedbacks')->with('success', 'Feedback updated successfully');
}


    public function destroy(Feedback $feedback)
    {
        if ($feedback->profile_img) {

            Storage::delete('public/images/' . $feedback->profile_img);
        }

        $feedback->delete();


        return redirect()->route('feedbacks')->with('success', 'Feedback deleted successfully');
    }
}

