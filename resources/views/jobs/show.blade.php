@extends('layout.header')

@section('content')
<div class="container mx-auto p-4">

    <!-- BANNER -->
    <div class="banner-img mb-3">
        <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1755158462/bannerchitiet_mo4rlb.png" 
             class="w-100 rounded">
    </div>

    <!-- TITLE + APPLY -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Frontend Developer</h2>
        <a href="#" class="btn btn-primary">Ứng tuyển</a>
    </div>

    <!-- INFO -->
    <div class="d-flex gap-4 mb-3 text-muted">
        <div>⏰ Fulltime</div>
        <div>📍 Đà Nẵng</div>
    </div>

    <!-- CARD -->
    <div class="row mb-4">

        <!-- LEFT -->
        <div class="col-md-7">
            <div class="card p-3 shadow-sm mb-3">
                <h5 class="text-primary">Thông tin công việc</h5>
                <p><strong>Công ty:</strong> FPT Software</p>
                <p><strong>Số lượng:</strong> 5</p>
                <p><strong>Lương:</strong> 15.000.000 VNĐ</p>
                <p><strong>Loại hình:</strong> Fulltime</p>
            </div>

            <div class="card p-3 shadow-sm mb-3">
                <h5 class="text-primary">Mô tả công việc</h5>
                <p>
                    - Phát triển website<br>
                    - Làm việc với team Backend<br>
                    - Tối ưu hiệu năng
                </p>
            </div>

            <div class="card p-3 shadow-sm mb-3">
                <h5 class="text-warning">Yêu cầu</h5>
                <p>
                    - Biết HTML, CSS, JS<br>
                    - Có kinh nghiệm React là lợi thế
                </p>
            </div>

            <div class="card p-3 shadow-sm">
                <h5 class="text-success">Quyền lợi</h5>
                <p>
                    - Lương thưởng hấp dẫn<br>
                    - Môi trường năng động
                </p>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-5">
            <div class="card p-3 shadow-sm mb-3 text-center">
                <h6 class="text-primary">Nơi làm việc</h6>
                <p>FPT Software - Đà Nẵng</p>
            </div>

            <div class="card p-3 shadow-sm">
                <h6 class="text-primary">Giới thiệu công ty</h6>
                <p>
                    FPT Software là công ty công nghệ hàng đầu Việt Nam...
                </p>
            </div>
        </div>

    </div>

    <!-- CONTACT -->
    <div class="card p-3 shadow-sm mb-4">
        <h5>Thông tin liên hệ</h5>
        <p>Email: recruitment@fsoft.com.vn</p>
        <p>Phone: 0909 999 999</p>
    </div>

    <!-- COMMENTS -->
    <div class="card p-3 shadow-sm mb-4">
        <h5>Bình luận</h5>

        <!-- COMMENT ITEM -->
        <div class="border p-2 mb-2 rounded">
            <strong>Nguyễn Văn A</strong>
            <div class="text-warning">⭐⭐⭐⭐⭐</div>
            <p>Công việc rất tốt!</p>
        </div>

        <div class="border p-2 mb-2 rounded">
            <strong>Trần Thị B</strong>
            <div class="text-warning">⭐⭐⭐⭐</div>
            <p>Môi trường ok</p>
        </div>
    </div>

    <!-- FORM COMMENT -->
    <div class="card p-3 shadow-sm">
        <h5>Viết bình luận</h5>

        <textarea class="form-control mb-2" rows="3" placeholder="Nhập nội dung..."></textarea>

        <!-- STAR -->
        <div class="mb-2" id="stars">
            <span class="star">☆</span>
            <span class="star">☆</span>
            <span class="star">☆</span>
            <span class="star">☆</span>
            <span class="star">☆</span>
        </div>

        <button class="btn btn-primary">Gửi</button>
    </div>

</div>

<!-- SCROLL TOP -->
<button id="scrollTopBtn">↑</button>

<style>
.star {
    font-size: 24px;
    cursor: pointer;
}
.star.active {
    color: gold;
}

#scrollTopBtn {
    position: fixed;
    bottom: 30px;
    right: 20px;
    background: orange;
    color: white;
    border: none;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: none;
}
</style>

<script>
// ⭐ STAR
document.querySelectorAll('.star').forEach((star, index) => {
    star.addEventListener('click', () => {
        document.querySelectorAll('.star').forEach((s, i) => {
            s.classList.toggle('active', i <= index);
        });
    });
});

// 🔼 SCROLL TOP
const btn = document.getElementById("scrollTopBtn");

window.addEventListener("scroll", () => {
    btn.style.display = window.scrollY > 200 ? "block" : "none";
});

btn.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
</script>

@include('layout.footer')
@endsection