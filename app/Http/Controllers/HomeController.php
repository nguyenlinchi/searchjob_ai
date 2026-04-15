<?php
namespace App\Http\Controllers;

use App\Models\JobPosting;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::with([
                'employer',
                'jobType',
                'salary',
                'location'
            ])
            ->where('status', 1)
            ->orderBy('job_id', 'desc')
            ->get();

        return view('home', compact('jobs'));
    }
}