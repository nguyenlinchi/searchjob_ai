{{-- resources/views/profile/apply.blade.php --}}

@extends('layout.header')

@section('content')

<div class="container py-5">

    <div class=" border-0 rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">

                Ứng tuyển công việc

            </h2>


            <!-- JOB -->
            <div class="mb-4">

                <h4 class="fw-bold text-primary">

                    {{ $job->job_title }}

                </h4>

            </div>


            <!-- CANDIDATE -->
            <div class="mb-4">

                <p>

                    <strong>Họ tên:</strong>

                    {{ $candidate->full_name }}

                </p>

                <p>

                    <strong>Số điện thoại:</strong>

                    {{ $candidate->phone }}

                </p>

                <p>

                    <strong>Địa chỉ:</strong>

                    {{ $candidate->address }}

                </p>

            </div>



            <!-- FORM -->
            <form action="{{ route('profile.storeApply', $job->job_id) }}" method="POST">

            @csrf


                <!-- CHỌN CV -->
                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Chọn CV

                    </label>

                    <select name="resume_id"
                            class="form-select">

                        <option value="">

                            -- Chọn CV --

                        </option>

                        @foreach($resumes as $resume)

                            <option value="{{ $resume->resume_id }}">

                                {{ $resume->resume_title }}

                            </option>

                        @endforeach

                    </select>

                </div>



                <!-- LINK CV -->
                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Link CV (nếu có)

                    </label>

                    <input type="text"
                           name="resume_link"
                           class="form-control"
                           placeholder="https://...">

                </div>



                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-dark px-5 py-2 rounded-pill">

                    Nộp hồ sơ

                </button>

            </form>

        </div>

    </div>

</div>

@endsection