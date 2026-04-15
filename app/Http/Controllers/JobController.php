<?php
use App\Models\JobPosting;

public function index()
{
    $jobs = JobPosting::with(['employer','jobType','location','salary'])
                ->where('status', 1)
                ->latest()
                ->get();

    return view('jobs.index', compact('jobs'));
}