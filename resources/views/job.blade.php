@extends('layout.header')

@section('title', 'Search Job')

@section('content')
<section class="job-search-section">
    <div class="search-box">
        <div class="search-content">

            <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755142681/job_wrj3pa.png" class="mascot">

            <div class="search-fields">
                <div class="search-row">
                    <select>
                        <option>Ngành nghề</option>
                        <option>IT</option>
                        <option>Marketing</option>
                    </select>

                    <select>
                        <option>Khu vực</option>
                        <option>Đà Nẵng</option>
                        <option>Hà Nội</option>
                    </select>

                    <input type="text" placeholder="Vị trí, chức danh...">

                    <button>Tìm kiếm</button>
                    <button class="btn-reset">Xóa</button>
                </div>

                <div class="tags">
                    <span>Phổ biến:</span>
                    <a>IT</a>
                    <a>Marketing</a>
                    <a>Kế toán</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="job-page">
    <div class="container">

        <!-- HEADER -->
        <div class="job-header">
            <h4>Bộ lọc nâng cao</h4>
            <span>1 - 9 của 20 việc làm</span>
        </div>

        <div class="layout">

            <!-- FILTER -->
            <div class="filter">
                <h5>Mức lương</h5>
                <label><input type="radio"> Tất cả</label>
                <label><input type="radio"> 0 - 100k</label>
                <label><input type="radio"> 100k - 200k</label>

                <h5>Vị trí</h5>
                <label><input type="checkbox"> Phục vụ</label>
                <label><input type="checkbox"> Thu ngân</label>
                <label><input type="checkbox"> Dọn dẹp</label>
            </div>

            <!-- JOB LIST -->
            <div class="job-list">

                <div class="job-card">
                    <h3>Nhân viên phục vụ</h3>
                    <p>📍 Đà Nẵng</p>
                    <p>⏳ 30/12/2026</p>
                    <div class="job-bottom">
                        <span class="salary">200.000 VNĐ</span>
                        <button>Ứng tuyển</button>
                    </div>
                </div>

                <div class="job-card">
                    <h3>Nhân viên IT</h3>
                    <p>📍 Hà Nội</p>
                    <p>⏳ 25/12/2026</p>
                    <div class="job-bottom">
                        <span class="salary">500.000 VNĐ</span>
                        <button>Ứng tuyển</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('layout.footer')

@endsection