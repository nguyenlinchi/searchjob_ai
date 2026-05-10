@extends('layout.header')

@section('content')
<div class="profile-wrapper">
    <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755698189/fpt-right-element1_bn4dxg.png" class="decor-element decor-left d-none d-lg-block">
    <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755698197/2_os2iu6.png" class="decor-element decor-right d-none d-lg-block">

    <div class="container pb-5">
        <div class= "profile-header-card custom-border-blue shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="cover-photo">
                @if(!empty($candidate->cover_image))
                    <img src="{{ $candidate->cover_image }}" alt="Cover">
                @else
                    <div class="cover-placeholder"></div>
                @endif
                <label for="coverInput" class="edit-cover-btn"><i class="bi bi-camera"></i></label>
            </div>
            
            <div class="profile-info-section p-4 text-center">
                <div class="avatar-wrapper">
                    <img src="{{ $candidate->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($candidate->full_name) }}" 
                         class="profile-avatar shadow" id="avatarPreview">
                    <label for="avatarInput" class="edit-avatar-btn"><i class="bi bi-pencil-fill"></i></label>
                </div>
                
                <h2 class="fw-bold mt-3 mb-1">{{ $candidate->full_name ?? Auth::user()->name }}</h2>
                <p class="text-muted mb-3"><i class="bi bi-patch-check-fill text-primary"></i> Ứng viên tiềm năng</p>
                
                <div class="d-flex justify-content-center gap-2">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                        <i class="bi bi-briefcase me-1"></i> {{ count($applications) }} Đã ứng tuyển
                    </span>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                        <i class="bi bi-file-earmark-person me-1"></i> {{ count($resumes) }} Hồ sơ
                    </span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
               <div class="custom-border-blue shadow-sm rounded-4 p-4 sticky-top" 
         style="top: 100px; background: #f8fafc; z-index: 10;">
                    <h5 class="fw-bold mb-4">Thông tin cá nhân</h5>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="avatarInput" name="avatar" hidden onchange="this.form.submit()">
                        <input type="file" id="coverInput" name="cover_image" hidden onchange="this.form.submit()">
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Họ và tên</label>
                            <input type="text" name="full_name" class="form-control input-premium" value="{{ $candidate->full_name }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control input-premium" value="{{ $candidate->phone }}">
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-bold text-secondary">Giới tính</label>
                                <select name="gender" class="form-select input-premium">
                                    <option value="Nam" {{ $candidate->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ $candidate->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold text-secondary">Ngày sinh</label>
                                <input type="date" name="date_of_birth" class="form-control input-premium" value="{{ $candidate->date_of_birth }}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-secondary">Địa chỉ</label>
                            <input type="text" name="address" class="form-control input-premium" value="{{ $candidate->address }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold py-2 shadow-sm btn-hover-effect">
                            Lưu thay đổi
                        </button>
                    </form>

                    <form action="{{ route('logout') }}" method="POST" class="mt-3 text-center border-top pt-2">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger text-decoration-none small fw-bold">
                            <i class="bi bi-box-arrow-right me-1"></i> Đăng xuất tài khoản
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="section-card mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">Hồ sơ trực tuyến</h4>
                        <a href="{{ route('resume.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg me-1"></i> Tạo CV mới
                        </a>
                    </div>
                    
                    <div class="row g-3">
                        @forelse($resumes as $resume)
                            <div class="col-md-6">
                                <div class=" resume-card h-100 border-0 shadow-sm p-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-box bg-primary-soft text-primary me-3">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0 text-truncate">{{ $resume->resume_title }}</h6>
                                    </div>
                                    <p class="small text-muted mb-0 text-truncate-2">{{ $resume->career_objective }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center p-4 bg-light rounded-4 w-100">
                                <p class="text-muted mb-0">Bạn chưa có hồ sơ nào.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Applications -->
                <div class="section-card">
                    <h4 class="fw-bold mb-4">Lịch sử ứng tuyển</h4>
                    @forelse($applications as $application)
                        <div class=" application-card border-0 shadow-sm mb-3 overflow-hidden">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="fw-bold mb-1 text-primary">{{ $application->job->job_title }}</h5>
                                        <p class="text-muted small mb-2">
                                            <i class="bi bi-calendar3 me-1"></i> Nộp ngày: {{ \Carbon\Carbon::parse($application->applied_date)->format('d/m/Y') }}
                                        </p>
                                        @php
                                            $statusClass = [0 => 'bg-warning-soft text-warning', 1 => 'bg-success-soft text-success', 2 => 'bg-danger-soft text-danger'];
                                            $statusText = [0 => 'Đang chờ duyệt', 1 => 'Đã trúng tuyển', 2 => 'Chưa phù hợp'];
                                        @endphp
                                        <span class="badge {{ $statusClass[$application->status] ?? 'bg-secondary' }} px-3 py-2 rounded-pill">
                                            {{ $statusText[$application->status] ?? 'Không xác định' }}
                                        </span>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <div class="d-flex gap-2 justify-content-md-end">
                                            <a href="{{ route('jobs.show', $application->job->job_id) }}" class="btn btn-light btn-sm rounded-circle shadow-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('application.delete', $application->application_id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm text-danger rounded-circle shadow-sm" onclick="return confirm('Xóa đơn này?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" width="80" class="mb-3 opacity-50">
                            <p class="text-muted">Bạn chưa ứng tuyển công việc nào.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #2563eb;
        --secondary-color: #7c3aed;
    }


    .profile-wrapper {
        background-color: #f8fafc;
        min-height: 100vh;
        padding-top: 100px; 
    }

    /* Decor Elements */
    .decor-element {
        position: fixed;
        z-index: 0;
        pointer-events: none;
        opacity: 0.6;
    }
    .decor-left { 
        top: 70%; 
        left: -50px;
        width: 200px; 
    }
    .decor-right { 
        top: 20%; 
        right: -50px; 
        width: 180px; 
    }

    .profile-header-card { 
        position: relative; 
        z-index: 1; 
    }
    .custom-border-blue {
    border: 2px solid #3b82f6 !important; 
    
}
    .cover-photo { 
        height: 200px; 
        position: relative; 
    }
    .cover-photo img { 
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
    }
    .cover-placeholder { 
        width: 100%; 
        height: 100%; 
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)); 
    }
    
    .avatar-wrapper { 
        position: relative; 
        display: inline-block; 
        margin-top: -75px; 
    }
    .profile-avatar { 
        width: 150px; 
        height: 150px; 
        border-radius: 50%; 
        border: 5px solid white; 
        object-fit: cover; 
    }
    
    .edit-avatar-btn, .edit-cover-btn {
        position: absolute; background: white; width: 35px; height: 35px; 
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); cursor: pointer; transition: 0.3s;
    }
    .edit-avatar-btn { bottom: 10px; right: 10px; }
    .edit-cover-btn { top: 15px; right: 15px; }
    .edit-avatar-btn:hover { background: var(--primary-color); color: white; }

    /* Soft Badges */
    .bg-primary-soft { background: #eff6ff; }
    .bg-success-soft { background: #f0fdf4; }
    .bg-warning-soft { background: #fffbeb; }
    .bg-danger-soft { background: #fef2f2; }

    
    .resume-card, .application-card {
        transition: all 0.3s ease;
        border: 1px solid transparent !important;
        border-radius: 15px;
    }
    .resume-card:hover, .application-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important;
        border-color: var(--primary-color) !important;
    }

    .icon-box {
        width: 45px; height: 45px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
    }

    .text-truncate-2 {
        display: -webkit-box; -webkit-line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .container { 
        animation: fadeInUp 0.6s ease-out; 
    }
    .input-premium {
        background-color: #ffffff !important;
        border: 1px solid #e2e8f0 !important; /* Viền xám nhạt */
        border-radius: 12px !important;
        padding: 10px 15px;
        font-weight: 500;
        color: #334155;
        /* Tạo độ nổi bằng đổ bóng nhẹ bên ngoài */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02) !important;
        transition: all 0.2s ease-in-out;
    }

    /* Hiệu ứng khi nhấn vào ô input (Focus) */
    .input-premium:focus {
        border-color: #3b82f6 !important; /* Đổi sang viền xanh */
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1) !important; /* Vầng sáng xanh nhạt xung quanh */
        background-color: #f3eded !important;
        outline: none;
    }

    /* Hiệu ứng cho nút bấm */
    .btn-hover-effect {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .btn-hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3) !important;
    }

    /* Tinh chỉnh nhãn label cho chuyên nghiệp */
    .form-label {
        margin-left: 4px;
        margin-bottom: 6px;
        letter-spacing: 0.02em;
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection