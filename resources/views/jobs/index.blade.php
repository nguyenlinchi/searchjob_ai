@extends('layout.header')

@section('title', 'FPT Software Career')

@section('content')

<!-- SEARCH -->
    <div class="job-search-section py-5">
        <div class="container search-container">
            <form action="{{ route('jobs.index') }}" method="GET" class="search-box">
                <div class="search-content">
                    <div class="mascot-container">
                        <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755142681/job_wrj3pa.png" 
                            alt="Mascot" class="mascot-img">
                    </div>
                    <div class="search-fields">
                        <div class="search-row">
                            <select name="category_id">
                                <option value="">Ngành nghề</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}"
                                        {{ request('category_id') == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                           <select name="location_id">
                                <option value="">Khu vực</option>

                                @foreach($locations as $location)
                                    <option value="{{ $location->location_id }}"
                                        {{ request('location_id') == $location->location_id ? 'selected' : '' }}>
                                        {{ $location->location_name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" name="title" placeholder="Vị trí, chức danh..." value="{{ request('title') }}">
                            <button type="submit">Tìm kiếm</button>
                            <a href="{{ route('jobs.index') }}" class="btn-reset">Xóa</a>
                        </div>

                        <div class="popular-tags-inside">
                            <span class="fw-bold">Phổ biến:</span>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- JOB PAGE -->
    <div class="job-page py-4">
        <div class="container">

            <!-- HEADER -->
            <div class="row mb-3 align-items-center">
                <div class="col-lg-3">
                    <h5 class="filter-title">Bộ lọc nâng cao <span class="reset-filter" onclick="resetFilters()">Đặt lại</span></h5>

                </div>

                <div class="col-lg-9 d-flex justify-content-between">
                    <span>Hiển thị 1 - 6 của 20 việc làm</span>

                    <select class="job-sort">
                        <option>Mới nhất</option>
                        <option>Hạn gần nhất</option>
                    </select>
                </div>
            </div>

            <div class="row">

                <!-- FILTER -->
                <div class="col-lg-3 filter-section">
                 <form id="filterForm" method="GET" action="{{ route('jobs.index') }}">

                    <h6>Mức lương</h6>
                    <label>
                         <input type="checkbox" name="salary_range" value="" 
                                        {{ empty(request('salary_range')) ? 'checked' : '' }} 
                                        onchange="submitFilterForm()"> 
                                    Tất cả
                                </label><br>

                    @foreach($salaries as $salary)
                        <label>
                            <input type="checkbox" name="salary[]" value="{{ $salary->salary_id }}">
                            {{ $salary->salary_range }}
                        </label><br>
                    @endforeach

                    <h6 class="mt-3">Vị trí</h6>
                    <label>
                        <input type="checkbox" value=""> Tất cả
                    </label><br>
                    @foreach($categories as $category)
                        <label>
                            <input type="checkbox" name="category[]" value="{{ $category->category_id }}">
                            {{ $category->category_name }}
                        </label><br>
                    @endforeach
                     </form>
                </div>

                <!-- JOB LIST -->
            <div class="col-lg-9">
                <div class="row">

                    @forelse($jobs->take(6) as $job)

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="job-card">

                                <!-- TOP -->
                                <div class="job-top">
                                    <div class="job-logo">
                                        <img src="{{ $job->employer->avatar ?? 'https://via.placeholder.com/60' }}">
                                    </div>

                                    <div class="job-info">
                                        <h5>
                                            <a class="job-title" href="{{ route('jobs.show', $job->job_id) }}">
                                                {{ $job->job_title }}
                                            </a>
                                            <span class="job-icon">⚡</span>
                                        </h5>

                                        <span>
                                            {{ $job->employer->company_name ?? 'Chưa có công ty' }}
                                        </span><br>

                                        <span class="job-deadline">
                                            Thời hạn:
                                            {{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('d/m/Y') : '' }}
                                        </span>
                                    </div>
                                </div>

                                <span class="divider"></span>

                                <!-- FOOTER -->
                                <div class="job-footer">
                                    <div class="job-meta">
                                        <small>
                                            {{ $job->jobType->job_type_name ?? 'Toàn thời gian' }} |
                                            {{ $job->location->location_name ?? 'Đà Nẵng' }}
                                        </small>
                                    </div>

                                    <div class="job-bottom">
                                        <span class="job-salary">
                                            {{ $job->salary->salary_range ?? 'Thỏa thuận' }}
                                        </span>

                                        <a href="#" class="apply-btn">Ứng tuyển</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @empty
                        <p>Không có dữ liệu</p>
                    @endforelse

                    </div>
                </div>
                    <!-- 🔥 PHÂN TRANG -->
                <div class="d-flex justify-content-center mt-4" style="margin-left: 100px;" >
                    {{ $jobs->links() }}
                </div>
        </div>
    </div>


<!-- SLOGAN -->
    <div class="slogan-frame">
        <div class="slogan-icon">
            <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1754574797/13_iuyjhm.png">
        </div>
        <div class="slogan-text">
            Chúng tôi không thu bất kì chi phí nào của ứng viên
        </div>
    </div>

<script>
function submitFilterForm() {
    document.getElementById('filterForm').submit();
}

function resetFilters() {
    // Lấy URL hiện tại và xóa các tham số filter
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    
    // Xóa các tham số filter
    params.delete('salary_range');
    params.delete('positions[]');
    params.delete('positions');
    
    // Chuyển hướng đến URL mới
    window.location.href = url.pathname + '?' + params.toString();
}

// JavaScript để xử lý filter
document.addEventListener('DOMContentLoaded', function() {
    const scrollBtn = document.getElementById("scrollTopBtn");

    // Hiện nút khi cuộn xuống 200px
    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            scrollBtn.style.display = "flex";
        } else {
            scrollBtn.style.display = "none";
        }
    });

    // Sự kiện click -> cuộn lên đầu
    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
</script>



@include('layout.footer')
@endsection