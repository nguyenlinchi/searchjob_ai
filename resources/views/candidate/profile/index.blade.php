@extends('layout.header')

@section('content')

<div class="container mt-5 position-relative">

    <!-- Background Left -->
    <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755698189/fpt-right-element1_bn4dxg.png"
         class="d-none d-lg-block"
         style="
            position: fixed;
            top: 80%;
            left: -70px;
            transform: translateY(-50%);
            width: 250px;
            z-index: -1;
         ">

    <!-- Background Right -->
    <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755698197/2_os2iu6.png"
         class="d-none d-lg-block"
         style="
            position: fixed;
            top: 30%;
            right: -55px;
            transform: translateY(-50%);
            width: 200px;
            z-index: -1;
         ">


    <!-- PROFILE -->
    <div class="border-0 rounded-4 overflow-hidden">

        <!-- COVER -->
        <div style="height:250px; overflow:hidden;">

            @if(!empty($candidate->cover_image))

                <img src="{{ $candidate->cover_image }}"
                     style="
                        width:100%;
                        height:100%;
                        object-fit:cover;
                     ">

            @else

                <div style="
                    width:100%;
                    height:100%;
                    background: linear-gradient(135deg,#2563eb,#7c3aed);
                ">
                </div>

            @endif

        </div>


        <!-- PROFILE CONTENT -->
        <div class="p-4 position-relative">


            <!-- AVATAR -->
            <div class="text-center"
                 style="margin-top:-90px;">

                <form action="{{ route('profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <label for="avatarInput"
                           style="cursor:pointer;">

                        @if(!empty($candidate->avatar))

                            <img src="{{$candidate->avatar }}"
                                 class="rounded-circle border border-4 border-white shadow"
                                 style="
                                    width:150px;
                                    height:150px;
                                    object-fit:cover;
                                 ">

                        @else

                            <img src="{{ asset('images/default-avatar.png') }}"
                                 class="rounded-circle border border-4 border-white shadow"
                                 style="
                                    width:150px;
                                    height:150px;
                                    object-fit:cover;
                                 ">

                        @endif

                    </label>

                    <input type="file"
                           id="avatarInput"
                           name="avatar"
                           hidden
                           onchange="this.form.submit()">

                </form>

            </div>


            <!-- NAME -->
            <div class="text-center mt-3">

                <h2 class="fw-bold">

                    {{ $candidate->full_name ?? Auth::user()->name }}

                </h2>

                <p class="text-muted">

                    Candidate Profile

                </p>

            </div>


            <!-- SUCCESS -->
            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif



            <!-- UPDATE FORM -->
            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4 mt-2">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Họ và tên
                        </label>

                        <input type="text"
                               name="full_name"
                               class="form-control"
                               value="{{ $candidate->full_name ?? '' }}">

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Số điện thoại
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ $candidate->phone ?? '' }}">

                    </div>



                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Giới tính
                        </label>

                        <select name="gender"
                                class="form-select">

                            <option value="">
                                -- Chọn --
                            </option>

                            <option value="Nam"
                                {{ ($candidate->gender ?? '') == 'Nam' ? 'selected' : '' }}>
                                Nam
                            </option>

                            <option value="Nữ"
                                {{ ($candidate->gender ?? '') == 'Nữ' ? 'selected' : '' }}>
                                Nữ
                            </option>

                        </select>

                    </div>



                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Ngày sinh
                        </label>

                        <input type="date"
                               name="date_of_birth"
                               class="form-control"
                               value="{{ $candidate->date_of_birth ?? '' }}">

                    </div>



                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Địa chỉ
                        </label>

                        <input type="text"
                               name="address"
                               class="form-control"
                               value="{{ $candidate->address ?? '' }}">

                    </div>



                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Avatar
                        </label>

                        <input type="file"
                               name="avatar"
                               class="form-control">

                    </div>



                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Ảnh bìa
                        </label>

                        <input type="file"
                               name="cover_image"
                               class="form-control">

                    </div>

                </div>


                <div class="text-center mt-4">

                    <button type="submit"
                            class="btn btn-primary px-5 py-2 rounded-pill">

                        Cập nhật hồ sơ

                    </button>

                </div>

            </form>


            <!-- RESUMES -->
            <div class="mt-5">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h3 class="fw-bold">
                        CV của tôi
                    </h3>

                    <a href="{{ route('resume.create') }}"
                       class="btn btn-success rounded-pill">

                        + Tạo CV

                    </a>

                </div>


                @forelse($resumes as $resume)

                    <div class=" mb-3 border-0 shadow-sm rounded-4">

                        <div class="card-body">

                            <h5 class="fw-bold">

                                {{ $resume->resume_title }}

                            </h5>

                            <p class="text-muted mb-1">

                                {{ $resume->career_objective }}

                            </p>

                        </div>

                    </div>

                @empty

                    <p class="text-muted">
                        Chưa có CV nào.
                    </p>

                @endforelse

            </div>



            <!-- APPLICATIONS -->
            <!-- APPLICATIONS -->
<div class="mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold mb-0">
            Công việc đã ứng tuyển
        </h3>

        <span class="badge bg-dark px-3 py-2 rounded-pill">
            {{ count($applications) }} công việc
        </span>

    </div>


    @forelse($applications as $application)

        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                    <!-- LEFT -->
                    <div>

                        <h4 class="fw-bold mb-2 text-dark">

                            {{ $application->job->job_title ?? 'Không có tiêu đề' }}

                        </h4>

                        <p class="text-muted mb-2">

                            <i class="fa-regular fa-calendar me-2"></i>

                            Ngày ứng tuyển:
                            {{ \Carbon\Carbon::parse($application->applied_date)->format('d/m/Y') }}

                        </p>


                        <!-- STATUS -->
                        @if($application->status == 0)

                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">

                                Chờ duyệt

                            </span>

                        @elseif($application->status == 1)

                            <span class="badge bg-success px-3 py-2 rounded-pill">

                                Đã duyệt

                            </span>

                        @else

                            <span class="badge bg-danger px-3 py-2 rounded-pill">

                                Từ chối

                            </span>

                        @endif

                    </div>



                    <!-- RIGHT -->
                    <div class="d-flex gap-2">

                        <!-- VIEW JOB -->
                        <a href="{{ route('jobs.show', $application->job_id) }}"
                           class="btn btn-outline-dark rounded-pill px-4">

                            Xem việc

                        </a>


                        <!-- DELETE -->
                        <form action="{{ route('application.delete', $application->application_id) }}"
                              method="POST"
                              onsubmit="return confirm('Bạn có muốn xóa đơn ứng tuyển này không?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger rounded-pill px-4">

                                Xóa

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="text-center py-5 bg-light rounded-4">

            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                 width="120"
                 class="mb-3">

            <h5 class="fw-bold">
                Bạn chưa ứng tuyển công việc nào
            </h5>

            <p class="text-muted">
                Hãy khám phá các công việc phù hợp với bạn.
            </p>

        </div>

    @endforelse

</div>



            <!-- LOGOUT -->
            <div class="text-center mt-5">

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button type="submit"
                            class="btn btn-outline-danger rounded-pill px-5">

                        Đăng xuất

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection