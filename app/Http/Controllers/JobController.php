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

        $title = $job->title . " Job Vacancy Details";

        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Current Openings', 'url' => route('jobs')],
            ['name' => $job->title],
        ];
        
        $viewedJobs = request()->cookie('viewed_jobs', []);
        $viewedJobs = is_array($viewedJobs) ? $viewedJobs : json_decode($viewedJobs, true);
        
        if (!in_array($job->job_post_id, $viewedJobs)) {
            $job->increment('views');
            $viewedJobs[] = $job->job_post_id;
            cookie()->queue('viewed_jobs', json_encode($viewedJobs), 1440 * 30);
        }

        $randomJobs = JobPost::where('job_post_id', '!=', $job->job_post_id)
        ->inRandomOrder()
        ->take(5)
        ->get();

        return view('jobs.show', compact('title', 'breadcrumbs', 'job', 'randomJobs'))->with('pageTitle', $title);
    }

}
