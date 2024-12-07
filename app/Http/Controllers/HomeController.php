<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPost;
use App\Models\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalJobs = JobPost::count();

        return view('home', compact('totalJobs'));
    }

    public function openings()
    {
        return view('app.openings.openings');
    }
}
