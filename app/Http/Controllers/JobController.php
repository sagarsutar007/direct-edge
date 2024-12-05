<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPost;
use App\Models\Company;

class JobController extends Controller
{
    public function index()
    {
        $query = JobPost::with('company');

        $jobs = $query->paginate(15);

        $title = 'Current Openings';
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Current Openings'],
        ];

        return view('jobs.index', compact('title', 'breadcrumbs', 'jobs'));
    }

    public function show($slug)
    {
        $job = JobPost::where('slug', $slug)->firstOrFail();

        $title = $job->title;

        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Current Openings', 'url' => route('jobs')],
            ['name' => $job->title],
        ];

        return view('jobs.show', compact('title', 'breadcrumbs', 'job'));
    }

}
