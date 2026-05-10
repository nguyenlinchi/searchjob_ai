<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use App\Models\Employer;
use App\Models\Category;
use App\Models\CareerGuide;
use App\Models\Candidate;
use App\Models\SavedJob;
use App\Helpers\SavedJobHelper;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $query = JobPosting::with([
                'employer',
                'jobType',
                'salary',
                'location'
            ])
            ->where('status', 1);


        if ($request->filled('title')) {

            $query->where(function ($q) use ($request) {

                // tìm theo tên công việc
                $q->where('job_title', 'like', '%' . $request->title . '%')

                // tìm theo loại công việc
                ->orWhereHas('jobType', function ($sub) use ($request) {

                    $sub->where('job_type_name', 'like', '%' . $request->title . '%');

                });

            });

        }


        if ($request->filled('location')) {

            $query->whereHas('location', function ($q) use ($request) {
                $q->where('location_name', 'like', '%' . $request->location . '%');
            });

        }


        $jobs = $query->orderBy('job_id', 'desc')
                    ->paginate(8);

        $jobs->appends($request->all());


        $topEmployers = Employer::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(10)
            ->get();

        $usedIds = $topEmployers->pluck('employer_id');

        $otherEmployers = Employer::withCount('jobs')
            ->whereNotIn('employer_id', $usedIds)
            ->limit(3)
            ->get();

        $categories = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->get();
        $guides = CareerGuide::with([
                'category',
                'tags'
            ])->latest()->limit(3)->get();
            $savedJobIds = [];

        if (Auth::check()) {

            $candidate = Candidate::where(
                'account_id',
                Auth::user()->account_id
            )->first();

            if ($candidate) {

                $savedJobIds = SavedJob::where(
                        'candidate_id',
                        $candidate->candidate_id
                    )
                    ->pluck('job_id')
                    ->toArray();
            }
        }
        $savedJobIds = SavedJobHelper::getSavedJobIds();

        return view('candidate.home', compact(
            'jobs',
            'topEmployers',
            'otherEmployers',
            'categories',
            'guides',
            'savedJobIds'
        ));
    }
}