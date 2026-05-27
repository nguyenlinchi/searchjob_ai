@extends('layout.employer')

@section('content')

<div class="container">

    <div class="card shadow-sm border-0">

        <!-- HEADER -->
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Chi tiết ứng viên</h4>

            @if($app->status == 0)
                <span class="badge bg-warning">Pending</span>
            @elseif($app->status == 1)
                <span class="badge bg-success">Approved</span>
            @else
                <span class="badge bg-danger">Rejected</span>
            @endif
        </div>

        <div class="card-body">

            <div class="row">

                <!-- LEFT -->
                <div class="col-md-4 text-center border-end">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($app->candidate->full_name) }}&background=6c5ce7&color=fff&size=120"
                         class="rounded-circle mb-3"
                         width="120">

                    <h4>{{ $app->candidate->full_name }}</h4>

                    <p class="text-muted">
                        Ứng tuyển:
                        <strong>{{ $app->job->job_title }}</strong>
                    </p>

                </div>

                <!-- RIGHT -->
                <div class="col-md-8">

                    <div class="mb-4">
                        <h5 class="mb-3">Thông tin ứng viên</h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="text-muted">Email</label>
                                <div>
                                    {{ $app->candidate->account->email ?? 'N/A' }}
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="text-muted">Ngày apply</label>
                                <div>
                                    {{ $app->applied_date }}
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- CV -->
                    <div class="mb-4">
                        <h5 class="mb-3">CV ứng viên</h5>

                        <a href="{{ $app->resume_link }}"
                           target="_blank"
                           class="btn btn-outline-primary">

                            <i class="fa fa-file-pdf me-2"></i>
                            Xem CV
                        </a>
                    </div>

                    <!-- UPDATE STATUS -->
                    <div>

                        <h5 class="mb-3">Cập nhật trạng thái</h5>

                        <form method="POST"
                              action="/employer/applications/{{ $app->application_id }}/status">

                            @csrf

                            <div class="row align-items-end">

                                <div class="col-md-6">
                                    <label class="form-label">Trạng thái</label>

                                    <select name="status" class="form-select">

                                        <option value="0"
                                            {{ $app->status == 0 ? 'selected' : '' }}>
                                            Chờ duyệt
                                        </option>

                                        <option value="1"
                                            {{ $app->status == 1 ? 'selected' : '' }}>
                                            Duyệt
                                        </option>

                                        <option value="2"
                                            {{ $app->status == 2 ? 'selected' : '' }}>
                                            Từ chối
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <button class="btn btn-primary w-100">
                                        <i class="fa fa-save me-2"></i>
                                        Cập nhật trạng thái
                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection