@extends('layout.header')

@section('title', 'Search Job')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="banner">
        <video autoplay muted loop playsinline class="banner-video">
        <source src="https://res.cloudinary.com/dumvx2lsj/video/upload/v1755831998/video1_zvxgkw.mp4" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ video.
        </video>

        <div class="banner-content">
        <h1>Khai phóng sự nghiệp</h1>
        <p>cùng chúng tôi</p>

        <form action="#" method="GET" class="search-box d-flex flex-wrap gap-2">
            
            <select name="job_category_id">
                <option value="">Ngành nghề</option>
                <option value="1">Công nghệ thông tin</option>
                <option value="2">Kinh doanh</option>
                <option value="3">Marketing</option>
                <option value="4">Nhân sự</option>
            </select>

            <input type="text" name="title" placeholder="Vị trí, chức danh..." value="{{ request('title') }}">

            <button type="submit">
            🔍 Tìm kiếm
            </button>

            <a href="#" class="btn-reset">Xóa</a>
        </form>
        </div>
    </div>

    <div class="job-section">
        <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755698189/fpt-right-element1_bn4dxg.png" 
            alt="Left Decor" class="decor-left d-none d-lg-block">
        <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755698197/2_os2iu6.png" 
            alt="Right Decor" class="decor-right d-none d-lg-block">

        <h1 class="job-title">Cơ hội nghề nghiệp</h1>

        <div class="job-list">

        @forelse($jobs as $job)

        <div class="job-card">
            <div class="job-top">

                <!-- LOGO -->
                <div class="job-logo">
                    <img src="{{ $job->employer->avatar ?? 'https://via.placeholder.com/60' }}">
                </div>

                <!-- CONTENT -->
                <div class="job-info">
                    <h5>
                        <a href="#">{{ $job->job_title }}</a>
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

        @empty
            <p>Không có dữ liệu</p>
        @endforelse

        </div>
    </div>


    <div class="company-section">

        <!-- HEADER -->
        <div class="company-header">
            <h2>Công ty lớn tiêu biểu</h2>
            <p>Hàng trăm thương hiệu lớn tiêu biểu đang tuyển dụng</p>
        </div>

        <div class="company-container">

            {{-- LEFT BIG CARD --}}
            @if($topEmployers->count() > 0)
            @php $big = $topEmployers->first(); @endphp

            <div class="company-big">
                <img src="{{ $big->avatar ?? 'images/default.png' }}" class="logo">

                <a href="{{ route('company', $big->employer_id) }}">
                    <h3>{{ $big->company_name }}</h3>
                </a> 
                <p>{{ $big->company_type ?? 'Chưa cập nhật' }}</p>

                <span class="job-count">{{ $big->jobs_count }} việc làm</span>

                <button class="pro-btn">Pro Company</button>
                <button class="follow-btn">+ Theo dõi</button>
            </div>
            @endif


            {{-- RIGHT GRID: 3 hàng × 3 --}}
            <div class="company-grid">

                @foreach($topEmployers->skip(1)->take(9)->chunk(3) as $row)
                <div class="company-row">

                    @foreach($row as $employer)
                    <div class="company-card">
                        <img src="{{ $employer->avatar ?? 'images/default.png' }}">

                        <div>
                            <a  href="{{ route('company', $employer->employer_id) }}">
                                <h4>{{ $employer->company_name }}</h4>
                            </a>                            
                            <p>{{ $employer->company_type ?? 'Chưa cập nhật' }}</p>
                            <span>{{ $employer->jobs_count }} việc làm</span>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endforeach

            </div>

        </div>


        {{-- PHẦN DƯỚI - KHÔNG TRÙNG --}}
        <div class="company-grid">

            @foreach($otherEmployers as $employer)
            <div class="company-card">
                <img src="{{ $employer->avatar ?? 'images/default.png' }}">

                <div>
                    <a  href="{{ route('company', $employer->employer_id) }}">
                        <h4>{{ $employer->company_name }}</h4>
                    </a> 
                    <p>{{ $employer->company_type ?? 'Chưa cập nhật' }}</p>
                    <span>{{ $employer->jobs_count }} việc làm</span>
                </div>
            </div>
            @endforeach

        </div>

    </div>

    <div class="job-dashboard">

        <!-- TITLE -->
        <div class="header">
            <h2>Thị trường việc làm hôm nay <span>14/04/2026</span></h2>
        </div>

        <div class="dashboard-box">

            <!-- LEFT -->
            <div class="left-panel">
                <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" class="robot">

                <h3>Công ty tuyển dụng nổi bật</h3>

                <!-- Miền Bắc -->
                <div class="company-item">
                    <div class="logo"></div>
                    <div>
                        <p class="company-name">FPT Software</p>
                        <small>Hà Nội (Miền Bắc)</small>
                    </div>
                </div>

                <!-- Miền Trung -->
                <div class="company-item">
                    <div class="logo"></div>
                    <div>
                        <p class="company-name">FPT Telecom</p>
                        <small>Đà Nẵng (Miền Trung)</small>
                    </div>
                </div>

                <!-- Miền Nam -->
                <div class="company-item">
                    <div class="logo"></div>
                    <div>
                        <p class="company-name">Shopee Vietnam</p>
                        <small>TP.HCM (Miền Nam)</small>
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="right-panel">

                <!-- STATS -->
                <div class="stats">
                    <div class="stat">
                        <h1>3.824</h1>
                        <p>Việc làm mới 24h</p>
                    </div>

                    <div class="stat">
                        <h1>61.660</h1>
                        <p>Việc làm đang tuyển</p>
                    </div>

                    <div class="stat">
                        <h1>20.071</h1>
                        <p>Công ty đang tuyển</p>
                    </div>
                </div>

                <!-- CHART -->
                <div class="charts">
                    <div class="chart-box">
                        <h4>Tăng trưởng cơ hội việc làm</h4>
                        <div class="fake-line"></div>
                    </div>

                    <div class="chart-box">
                        <h4>Nhu cầu tuyển dụng</h4>
                        <div class="fake-bar">
                            <div class="bar b1"></div>
                            <div class="bar b2"></div>
                            <div class="bar b3"></div>
                            <div class="bar b4"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="job-category">
    <div class="header">
        <h2>Ngành nghề nổi bật</h2>

        <div class="nav-btns">
            <button id="prev">&#8592;</button>
            <button id="next">&#8594;</button>
        </div>
    </div>

    <div class="category-wrapper">
        <div class="category-grid" id="slider">

            @foreach($categories as $category)
            <div class="card">
                <img src="{{ $category->image ?? 'images/default-category.png' }}">

                <div class="info">
                    <h3>{{ $category->category_name }}</h3>
                    <p>+{{ $category->jobs_count }} Việc Làm</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    </section>

    <section class="process-section">
        <div class="process-header">
            <h2> Quy trình hoạt động</h2>
            <p>Quy trình với 3 bước đơn giản, minh bạch và hoàn toàn không mất phí cho ứng viên.</p>
        </div>
        <div class="process-steps">
            <div class="process-step">
            <div class="circle">1</div>
            <h3>Tải lên CV</h3>
            <p>Chỉ cần tải hồ sơ lên, hệ thống AI sẽ tự động phân tích sâu các kỹ năng, kinh nghiệm và thế mạnh của bạn.Mọi dữ liệu được chuẩn hóa thông minh để làm nổi bật hồ sơ trước các nhà tuyển dụng hàng đầu.</p>
            </div>

            <svg class="step-connector" viewBox="0 0 200 100" preserveAspectRatio="none">
            <path d="M0,0 C50,30 150,30 200,0" stroke="#ccc" stroke-width="2" stroke-dasharray="6,6" fill="none" />
            </svg>

            <div class="process-step">
            <div class="circle">2</div>
            <h3>Lọc & Gợi ý</h3>
            <p>Dựa trên điểm tương thích (Matching Score), AI sẽ tự động lọc và đề xuất những vị trí phù hợp nhất với năng lực của bạn. Bạn không còn phải tốn hàng giờ để tìm kiếm thủ công giữa hàng ngàn tin tuyển dụng.</p>
            </div>
            <svg class="step-connector" viewBox="0 0 200 100" preserveAspectRatio="none">
            <path d="M0,0 C50,30 150,30 200,0" stroke="#ccc" stroke-width="2" stroke-dasharray="8,8" fill="none" />
            </svg>
            <div class="process-step">
            <div class="circle">3</div>
            <h3>Ứng tuyển</h3>
            <p>Bỏ qua các bước khai báo rườm rà. Với một cú click, hồ sơ của bạn sẽ được gửi trực tiếp đến nhà tuyển dụng. Hệ thống hỗ trợ theo dõi trạng thái phản hồi thời gian thực, giúp bạn nắm bắt cơ hội ngay lập tức.</p>
            </div>
        </div>
    </section>

        <section class="features-section">
            <h2 class="features-title"> Cùng chúng tôi đồng hành phát triển </h2>
            <div class="features-list">
                <!-- Card 1 -->
                <div class="feature-card feature-blue">
                <div class="feature-content">
                    <h3>Thương hiệu<br><span class="highlight">Cá nhân</span></h3>
                    <p>Đánh thức tiềm năng trong CV của bạn với công nghệ lọc AI, biến mỗi dòng kinh nghiệm thành thỏi nam châm thu hút những nhà tuyển dụng danh giá nhất.</p>
                </div>
                </div>
                <!-- Card 2 -->
                <div class="feature-card feature-orange">
                <div class="feature-content">
                    <h3>Công nghệ<br><span class="highlight1">Tiên phong</span></h3>
                    <p>Đắm mình trong hệ sinh thái AI thông minh để trải nghiệm quy trình tuyển dụng tương lai và trực tiếp làm chủ các giải pháp kỹ thuật dẫn đầu xu hướng toàn cầu.</p>
                </div>
                </div>
                <!-- Card 3 -->
                <div class="feature-card feature-green">
                <div class="feature-content">
                    <h3>Nâng tầm<br><span class="highlight2">Sự nghiệp</span></h3>
                    <p>Mở khóa lộ trình thăng tiến bứt phá với các cơ hội đào tạo chuyên sâu và nền tảng phát triển sự nghiệp không giới hạn tại các doanh nghiệp hàng đầu.</p>
                </div>
                </div>
            </div>
    </section>

    <div class="hero-section">
        <div class="hero-image">
            <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1754574012/cover_fwpo3i.png" alt="FPT Telecom Hero" />

        <img class="corner-image" src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1754574797/13_iuyjhm.png" alt="Overlay Image">

        </div>
        <div class="hero-content">
            <h2>
                <span class="good-job">Good Job</span><br>
                <span class="highlight">Hành trình kết nối & Kiến tạo</span> tương lai
            </h2>
            <p>
            Tại <span class="good-job">Good Job</span>, mỗi cơ hội nghề nghiệp là một hành trình để bạn bứt phá giới hạn và kết nối cùng những 
            đồng đội chung đam mê. Chúng tôi mang đến một hệ sinh thái công nghệ tiên phong, nơi ứng viên dễ dàng
            tìm thấy công việc mơ ước và nhà tuyển dụng tối ưu hóa quy trình lọc CV thông minh. Gia nhập Good job,
            bạn không chỉ xây dựng sự nghiệp mà còn cùng chúng tôi kiến tạo một tương lai số bền vững và đột phá.
            </p>
            <div class="hero-buttons">
                    <a href="#" class="">  Về chúng tôi</a>
                    <a href="#" class="btn-secondary">Life at FTEL</a>
            </div>
        </div>
    </div>
    <section class="blog-section">
        <div class="blog-header">
            <div>
            <h2>Blog & Tài nguyên</h2>
            <p>Góc chia sẻ từ chuyên gia để bứt phá sự nghiệp của bạn</p>
            </div>
            <a href="#" class="view-all">Xem tất cả →</a>
        </div>

        <div class="blog-grid">

            <!-- Card 1 -->
            <div class="blog-card">
            <div class="blog-image">
                <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a" alt="">
                <span class="tag">#Career</span>
            </div>
            <div class="blog-content">
                <h3>Cách viết CV vượt qua mọi bộ lọc AI hiện nay</h3>
                <p>Bí quyết giúp hồ sơ của bạn lọt vào mắt xanh của robot tuyển dụng...</p>
                <a href="#">Đọc tiếp →</a>
            </div>
            </div>

            <!-- Card 2 -->
            <div class="blog-card">
            <div class="blog-image">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c" alt="">
                <span class="tag">#IT Trends</span>
            </div>
            <div class="blog-content">
                <h3>Xu hướng tuyển dụng ngành IT năm 2026 có gì mới?</h3>
                <p>Khám phá những công nghệ và vị trí đang “khát” nhân lực nhất...</p>
                <a href="#">Đọc tiếp →</a>
            </div>
            </div>

            <!-- Card 3 -->
            <div class="blog-card">
            <div class="blog-image">
                <img src="https://images.unsplash.com/photo-1581090700227-1e8a9d3b1c74" alt="">
                <span class="tag">#Skills</span>
            </div>
            <div class="blog-content">
                <h3>Bộ câu hỏi phỏng vấn “xương” nhất cho sinh viên mới</h3>
                <p>Chuẩn bị tâm lý và cách trả lời thông minh để chinh phục nhà tuyển dụng...</p>
                <a href="#">Đọc tiếp →</a>
            </div>
            </div>

        </div>
    </section>

    <section class="press">
    <h2>Báo chí nói về Good Job</h2>

    <div class="press-container" id="pressContainer">
        <div class="press-item"><img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Vietnambiz_logo.png"></div>
        <div class="press-item"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Cafebiz_logo.png"></div>
        <div class="press-item"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Dautu_logo.png"></div>
        <div class="press-item"><img src="https://upload.wikimedia.org/wikipedia/commons/8/8b/Genk_logo.png"></div>
        <div class="press-item"><img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Kenh14_logo.png"></div>
        <div class="press-item"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Theleader_logo.png"></div>
        
    </div>
    </section>




<script>
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("slider");
    const next = document.getElementById("next");
    const prev = document.getElementById("prev");

    const cards = Array.from(slider.querySelectorAll(".card"));
    const itemsPerPage = 8;

    slider.innerHTML = ""; // clear

    // 👉 chia page tự động
    for (let i = 0; i < cards.length; i += itemsPerPage) {
        const page = document.createElement("div");
        page.classList.add("page");

        const group = cards.slice(i, i + itemsPerPage);
        group.forEach(card => page.appendChild(card));

        slider.appendChild(page);
    }

    let index = 0;
    const total = document.querySelectorAll(".page").length;

    next.onclick = () => {
        if (index < total - 1) {
            index++;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
    };

    prev.onclick = () => {
        if (index > 0) {
            index--;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
    };
});
</script>
  
<script>
    // hiệu ứng bong bóng
    document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".press-item");
    const container = document.getElementById("pressContainer");

    const containerWidth = container.offsetWidth;
    const containerHeight = container.offsetHeight;

    items.forEach(item => {
        // 👉 random size
        const size = Math.floor(Math.random() * 60) + 80; // 80 - 140px
        item.style.width = size + "px";
        item.style.height = size + "px";

        // 👉 random vị trí
        const x = Math.random() * (containerWidth - size);
        const y = Math.random() * (containerHeight - size);

        item.style.left = x + "px";
        item.style.top = y + "px";

        // 👉 animation random
        animate(item);
    });

    function animate(el) {
        let x = parseFloat(el.style.left);
        let y = parseFloat(el.style.top);

        let dx = (Math.random() - 0.5) * 2.5;
        let dy = (Math.random() - 0.5) * 2.5;

        function move() {
            x += dx;
            y += dy;

            // chạm biên thì bật lại
            if (x <= 0 || x >= container.offsetWidth - el.offsetWidth) dx *= -1;
            if (y <= 0 || y >= container.offsetHeight - el.offsetHeight) dy *= -1;

            el.style.left = x + "px";
            el.style.top = y + "px";

            requestAnimationFrame(move);
        }

        move();
    }
});
</script>

@include('layout.footer')

@endsection