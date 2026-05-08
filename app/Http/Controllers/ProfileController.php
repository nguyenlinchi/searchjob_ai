<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Candidate;
use App\Models\Resume;
use App\Models\Application;
use App\Models\JobPosting;


class ProfileController extends Controller
{

    // ================= PROFILE =================

    public function index()
    {

        $user = Auth::user();


        $candidate = Candidate::where(
            'account_id',
            $user->account_id
        )
        ->first();


        // ===== RESUMES =====

        $resumes = [];

        // ===== APPLICATIONS =====

        $applications = [];


        if ($candidate) {

            $resumes = Resume::where(
                'candidate_id',
                $candidate->candidate_id
            )->get();


            $applications = Application::where(
                'candidate_id',
                $candidate->candidate_id
            )
            ->with('job')
            ->orderBy('application_id', 'DESC')
            ->get();
        }


        return view(
            'candidate/profile.index',
            compact(
                'user',
                'candidate',
                'resumes',
                'applications'
            )
        );
    }



    // ================= UPDATE PROFILE =================

    public function update(Request $request)
    {

        $request->validate([

            'full_name' => 'required|max:100',

            'phone' => 'nullable|max:15',

            'gender' => 'nullable|max:10',

            'date_of_birth' => 'nullable|date',

            'address' => 'nullable|max:255',

            'avatar' => 'nullable|image',

            'cover_image' => 'nullable|image'

        ]);


        $user = Auth::user();


        $candidate = Candidate::where(
            'account_id',
            $user->account_id
        )->first();


        if (!$candidate) {

            $candidate = new Candidate();

            $candidate->account_id =
                $user->account_id;
        }



        $candidate->full_name =
            $request->full_name;

        $candidate->phone =
            $request->phone;

        $candidate->gender =
            $request->gender;

        $candidate->date_of_birth =
            $request->date_of_birth;

        $candidate->address =
            $request->address;



        // ===== AVATAR =====

        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');

            $avatarName = time() . '_avatar.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('uploads/avatar'),
                $avatarName
            );

            $candidate->avatar = $avatarName;
        }



        // ===== COVER IMAGE =====

        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');

            $coverName = time() . '_cover.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('uploads/cover'),
                $coverName
            );

            $candidate->cover_image = $coverName;
        }


        $candidate->save();


        return back()->with(
            'success',
            'Cập nhật hồ sơ thành công'
        );
    }

    public function apply($id)
    {
        $user = Auth::user();

        $job = JobPosting::findOrFail($id);

        $candidate = Candidate::where(
            'account_id',
            $user->account_id
        )->first();

        if (!$candidate) {

            return back()->with(
                'error',
                'Không tìm thấy ứng viên'
            );
        }

        $resumes = Resume::where(
            'candidate_id',
            $candidate->candidate_id
        )->get();

        return view(
            'candidate.profile.apply',
            compact(
                'job',
                'candidate',
                'resumes'
            )
        );
    }
   public function storeApply(Request $request, $id)
    {
        $request->validate([

            'resume_id' => 'required'

        ]);

        $user = Auth::user();

        $candidate = Candidate::where(
            'account_id',
            $user->account_id
        )->first();

        if (!$candidate) {

            return back()->with(
                'error',
                'Không tìm thấy ứng viên'
            );
        }

        $application = new Application();

        $application->job_id = $id;

        $application->candidate_id =
            $candidate->candidate_id;

        $application->resume_id =
            $request->resume_id;

        $application->resume_link =
            $request->resume_link;

        $application->status = 0;
        $application->applied_date = now();

        $application->save();

        return redirect()
            ->route('profile')
            ->with(
                'success',
                'Ứng tuyển thành công!'
            );
    }
    public function deleteApplication($id)
    {
        $application = Application::findOrFail($id);

        $application->delete();

        return back()->with(
            'success',
            'Đã xóa đơn ứng tuyển'
        );
    }

    // ================= CREATE RESUME =================

    public function createResume()
    {
        return view('profile.create_resume');
    }



    // ================= STORE RESUME =================

    public function storeResume(Request $request)
    {

        $request->validate([

            'resume_title' => 'required|max:100',

            'career_objective' => 'nullable',

            'experience' => 'nullable',

            'education' => 'nullable',

            'soft_skills' => 'nullable',

            'awards' => 'nullable'

        ]);


        $candidate = Auth::user()->candidate;


        $resume = new Resume();

        $resume->resume_title =
            $request->resume_title;

        $resume->candidate_id =
            $candidate->candidate_id;

        $resume->category_id =
            $request->category_id;

        $resume->job_type_id =
            $request->job_type_id;

        $resume->level_id =
            $request->level_id;

        $resume->career_objective =
            $request->career_objective;

        $resume->experience =
            $request->experience;

        $resume->education =
            $request->education;

        $resume->soft_skills =
            $request->soft_skills;

        $resume->awards =
            $request->awards;

        $resume->save();


        return redirect()
            ->route('profile')
            ->with(
                'success',
                'Tạo CV thành công'
            );
    }
}