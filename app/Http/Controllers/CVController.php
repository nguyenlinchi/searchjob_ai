<?php

namespace App\Http\Controllers;

use App\Http\Requests\CVUploadRequest;
use App\Http\Services\CVAnalyzerService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\JobPosting;

class CVController extends Controller
{
    protected $cvService;

    public function __construct(CVAnalyzerService $cvService)
    {
        $this->cvService = $cvService;
    }

    public function evaluate()
    {
        return view('candidate.cv.evaluate');
    }

    public function analyze(CVUploadRequest $request)
    {
        try {
            $result = $this->cvService->analyze($request->file('cv_file'));

            if (isset($result['error'])) {
                return back()->with('error', $result['error']);
            }

            $predicted_industry = $result['predicted_industry'] ?? '';
            $strengths = $result['strengths'] ?? [];

            $recommendedJobs = collect();

            if (!empty($predicted_industry)) {
                // Tìm Category theo tên ngành (sửa từ 'name' thành 'category_name')
                $category = Category::where('category_name', 'LIKE', "%{$predicted_industry}%")
                                    ->first();

                if ($category) {
                    $recommendedJobs = JobPosting::with([
                        'employer',
                        'jobType',
                        'salary',
                        'location',
                        'level',
                        'category'
                    ])
                    ->where('category_id', $category->category_id)
                    ->get()
                    ->map(function ($job) use ($strengths, $predicted_industry, $category) {
                        $matchCount = 0;
                        $totalSkills = count($strengths);

                        if ($totalSkills === 0) {
                            $job->match_score = 50;
                            $job->match_count = 0;
                            return $job;
                        }

                        // Thu thập text để so sánh (cải tiến)
                        $jobText = strtolower(
                            $job->job_title . ' ' .
                            ($job->candidate_requirements ?? '') . ' ' .
                            ($job->job_description ?? '') . ' ' .
                            ($job->benefits ?? '')
                        );

                        foreach ($strengths as $skill) {
                            $skillLower = strtolower(trim($skill));
                            if (empty($skillLower)) continue;

                            if (stripos($jobText, $skillLower) !== false) {
                                $matchCount++;
                            }
                        }

                        // Tính điểm cơ bản
                        $baseScore = round(($matchCount / $totalSkills) * 85);

                        // Bonus điểm
                        $bonus = 0;
                        if ($job->category_id === $category->category_id) {
                            $bonus += 15;                    // Cùng ngành
                        }
                        if (stripos($job->job_title, strtolower($predicted_industry)) !== false) {
                            $bonus += 10;                    // Tiêu đề khớp ngành
                        }

                        $finalScore = $baseScore + $bonus;

                        $job->match_score = min(98, max(35, $finalScore)); // Giới hạn 35% - 98%
                        $job->match_count = $matchCount;

                        return $job;
                    })
                    ->sortByDesc('match_score')
                    ->take(8);
                }
            }

            return back()
                ->with('success', 'Đánh giá CV thành công!')
                ->with('analysis', $result)
                ->with('filename', $request->file('cv_file')->getClientOriginalName())
                ->with('recommended_jobs', $recommendedJobs);

        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function index()
    {
        return view('candidate.cv.rcmcv');
    }
}