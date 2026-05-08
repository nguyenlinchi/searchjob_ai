<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\JobPosting;
use App\Models\Location;


class CompanyController extends Controller
{
     public function show(Request $request, $id)
    {
        // 🔹 Thông tin công ty
        $company = Employer::withCount('jobs')
            ->findOrFail($id);

        // 🔹 Query job
        $query = JobPosting::with([
                'jobType',
                'salary',
                'location',
                'level'
            ])
            ->where('employer_id', $id)
            ->where('status', 1)
            ->limit(10);

        // 🔍 Tìm theo tên công việc
        if ($request->filled('keyword')) {
            $query->where('job_title', 'like', '%' . $request->keyword . '%');
        }

        // 📍 Lọc theo địa điểm
        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        // 🔽 Lấy dữ liệu + phân trang
        $jobs = $query->orderBy('job_id', 'desc')->paginate(6);

        // 🔥 Giữ lại filter khi chuyển trang
        $jobs->appends($request->all());

        // 🔹 Danh sách địa điểm
        $locations = Location::all();

        return view('candidate/company', compact('company', 'jobs', 'locations'));
    }
}