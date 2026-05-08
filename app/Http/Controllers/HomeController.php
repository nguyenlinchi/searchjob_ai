<?php
namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\Employer; 
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        // 🔹 Danh sách việc làm
        $jobs = JobPosting::with([
                'employer',
                'jobType',
                'salary',
                'location'
            ])
            ->where('status', 1)
            ->orderBy('job_id', 'desc')
            ->limit(8)
            ->get();

        //  Danh sách công ty
        //  TOP (1 big + 9 grid)
            $topEmployers = Employer::withCount('jobs')
                ->orderBy('jobs_count', 'desc')
                ->limit(10)
                ->get();

            //  Lấy ID đã dùng
            $usedIds = $topEmployers->pluck('employer_id');

            // Danh sách dưới (KHÔNG TRÙNG)
            $otherEmployers = Employer::withCount('jobs')
                ->whereNotIn('employer_id', $usedIds)
                ->limit(3)
                ->get();


            $categories = Category::withCount('jobs')
                ->orderBy('jobs_count', 'desc')
                ->get();

        // ✅ CHỈ return 1 lần
        return view('candidate/home', compact('jobs', 'topEmployers', 'otherEmployers','categories'));
    }
}