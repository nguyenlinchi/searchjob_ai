<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>MBTI UI</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

/* ===== BODY ===== */
body {
    background: #f5f7f6;
}

/* ===== HERO ===== */
.hero {
    background: linear-gradient(135deg, #0f6b4f, #0aa06e);
    padding: 80px 20px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.hero p {
    opacity: 0.9;
}

/* DECOR */
.hero::before,
.hero::after {
    content: "";
    position: absolute;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: linear-gradient(45deg, #00ff99, #00ccff);
    opacity: 0.15;
}

.hero::before { top: -50px; left: -50px; }
.hero::after { bottom: -50px; right: -50px; }

/* BUTTON */
.btn-start {
    margin-top: 25px;
    display: inline-block;
    padding: 14px 28px;
    background: white;
    color: #0f6b4f;
    border-radius: 30px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.btn-start:hover {
    transform: scale(1.05);
}

/* ===== SLIDER ===== */
.slider {
    margin-top: 50px;
    overflow: hidden;
}

.slider-track {
    display: flex;
    animation: scroll 40s linear infinite;
    width: max-content;
}

.slider:hover .slider-track {
    animation-play-state: paused;
}

/* ===== CARD ===== */
.card {
    display: flex;
    width: 320px;
    margin: 0 12px;
    background: white;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

.card img {
    width: 120px;
    object-fit: cover;
}

.card-content {
    padding: 15px;
}

.card-content h3 {
    font-size: 15px;
    margin-bottom: 5px;
}

.card-content p {
    font-size: 13px;
    color: #666;
}

/* ANIMATION */
@keyframes scroll {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}

/* ===== SECTION 2 ===== */
.mbti-section {
    background: white;
    padding: 80px 10%;
}

.mbti-title {
    font-size: 36px;
    color: #0f6b4f;
    margin-bottom: 40px;
}

/* CONTENT */
.mbti-content {
    display: flex;
    align-items: center;
    gap: 60px;
}

/* IMAGE */
.mbti-image img {
    width: 400px;
}

/* TEXT */
.mbti-text {
    line-height: 1.7;
    color: #333;
}

/* CARD */
.card {
    background: #dfeee7;
    border-radius: 20px;
    padding: 20px;
}
.card-bottom p {
    margin: 0;
    font-size: 14px;
}
/* ===== SECTION 3 ===== */
.section{
    padding:80px 10%;
}

.section h1{
    font-size:36px;
    color:#0f6b4f;
}

.section p{
    margin-top:15px;
    max-width:700px;
}

/* GRID */
.grid{
    margin-top:40px;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:25px;
}

/* CARD GRID */
.card-grid{
    background:#e6f4ef;
    border-radius:20px;
    padding:20px;
}

.card-img{
    height:150px;
    border-radius:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px;
    color:white;
}

.card-bottom{
    margin-top:15px;
    display:flex;
    gap:10px;
    align-items:center;
}

.number{
    width:35px;
    height:35px;
    background:#00a86b;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
}

/* GRADIENT */
.bg-ei{background:linear-gradient(135deg,#1bbf73,#5a3fc0);}
.bg-sn{background:linear-gradient(135deg,#1bbf73,#ff5e3a);}
.bg-tf{background:linear-gradient(135deg,#4a7bd1,#ff4da6);}
.bg-jp{background:linear-gradient(135deg,#ff7e5f,#8e44ad);}

/* RESPONSIVE */
@media(max-width:768px){
    .mbti-content{flex-direction:column;}
    .grid{grid-template-columns:1fr;}
}
/* Container chính */
.mbti-container {
    background-color: #0d5c46; /* Màu xanh đậm nền web */
    padding: 60px 20px;
    text-align: center;
}

.main-title {
    color: #ffffff;
    font-size: 32px;
    margin-bottom: 40px;
}

/* Grid Layout */
.mbti-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    max-width: 1100px;
    margin: 0 auto;
}

/* Card Style chung */
.mbti-card {
    background: #ffffff;
    border-radius: 25px;
    padding: 20px 10px 0 10px;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    height: 350px;
    transition: transform 0.3s ease;
    background-color: transparent;
    width: 100%;
    height: 380px; /* Độ cao cố định cho thẻ */
    perspective: 1000px; /* Tạo hiệu ứng chiều sâu 3D */
    cursor: pointer;
}

/* Phần bên trong sẽ thực hiện xoay */
.card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d; /* Giữ các phần tử con trong không gian 3D */
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    border-radius: 25px;
}

/* Khi di chuột vào (Hover) -> Xoay 180 độ */
.mbti-card:hover .card-inner {
    transform: rotateY(180deg);
}

/* Định dạng chung cho cả mặt trước và mặt sau */
.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden; /* Ẩn mặt sau khi phần tử bị lật */
    border-radius: 25px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Mặt trước */
.card-front {
    background-color: #ffffff;
    color: black;
    padding: 20px 10px 0 10px;
}

/* Mặt sau */
.card-back {
    background-color: #f8f9fa;
    color: #333;
    transform: rotateY(180deg); /* Mặc định mặt sau đã bị lật sẵn */
    padding: 20px;
}

/* Trang trí mặt sau cho chuyên nghiệp */
.card-back h3 {
    margin-bottom: 15px;
    color: #0f6b4f;
}

.card-back ul {
    list-style: none;
    padding: 0;
    font-size: 14px;
    line-height: 2;
    margin-bottom: 20px;
}

.btn-detail {
    padding: 8px 20px;
    background: #0f6b4f;
    color: white;
    text-decoration: none;
    border-radius: 20px;
    font-size: 13px;
}

/* Màu nền mặt sau cho từng loại (tùy chọn) */
.bg-istj { border: 2px solid #69a032; }

.mbti-card:hover {
    transform: translateY(-10px);
}

.type-title {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 5px;
}

.type-desc {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 20px;
}

.type-img img {
    width: 100%;
    height: auto;
    display: block;
}

/* Thẻ đặc biệt (Text ở giữa) */
.special-card {
    justify-content: center;
    padding: 30px;
    text-align: center;
    background: #ffffff;
}

.special-text {
    color: #333;
    font-size: 18px;
    line-height: 1.5;
}

.arrow-circle {
    width: 40px;
    height: 40px;
    border: 1px solid #ccc;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    color: #0aa06e;
    cursor: pointer;
}
/* Ẩn tất cả page mặc định */
.mbti-grid {
    display: none;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 30px;
}

/* Khi chọn radio thì hiện page tương ứng */
#p1:checked ~ #page-1 {
    display: grid;
}

#p2:checked ~ #page-2 {
    display: grid;
}

/* DOT */
.pagination-dots {
    margin-top: 30px;
    text-align: center;
}

.dot {
    width: 12px;
    height: 12px;
    background: #ccc;
    display: inline-block;
    border-radius: 50%;
    margin: 0 5px;
    cursor: pointer;
    transition: 0.3s;
}

/* DOT ACTIVE */
#p1:checked ~ .pagination-dots #dot-1,
#p2:checked ~ .pagination-dots #dot-2 {
    background: #00c853;
    transform: scale(1.3);
}

/* Màu sắc riêng cho từng nhóm (Theo ảnh) */
.color-istj { color: #69a032; }
.color-infp { color: #35a375; }
.color-intj { color: #4e6bb1; }
.color-isfj { color: #ed709b; }
.color-istp { color: #d6613a; }
.color-infj { color: #b17d4e; }
.color-intp { color: #35a39a; }
.color-isfp { color: #9ab2e6; }


/* Border phía dưới ảnh để tạo hiệu ứng như mẫu */
.mbti-card.border-istj { border-bottom: 8px solid #69a032; }
.mbti-card.border-infp { border-bottom: 8px solid #35a375; }
.mbti-card.border-intj { border-bottom: 8px solid #4e6bb1; }
.mbti-card.border-isfj { border-bottom: 8px solid #ed709b; }
.mbti-card.border-istp { border-bottom: 8px solid #d6613a; }
.mbti-card.border-infj { border-bottom: 8px solid #b17d4e; }
.mbti-card.border-intp { border-bottom: 8px solid #35a39a; }
.mbti-card.border-isfp { border-bottom: 8px solid #9ab2e6; }



/* Mobile responsive */
@media (max-width: 768px) {
    .mbti-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Container tổng thể màu kem nhạt như ảnh */
.guide-container {
    max-width: 1100px;
    margin: 40px auto;
    padding: 60px 80px;
    background-color: #f9f8f2; /* Màu nền hơi vàng kem theo mẫu */
    border-radius: 40px;
    font-family: 'Arial', sans-serif;
}

.guide-title {
    color: #0d5c46;
    font-size: 32px;
    margin-bottom: 50px;
    font-weight: 700;
}

.guide-list {
    display: flex;
    flex-direction: column;
}

/* Tạo đường gạch ngang giữa các mục */
.guide-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 40px 0;
    border-top: 1px solid #e0e0e0; /* Đường gạch ngang mảnh */
}

/* Bố cục ảnh bên trái cho các mục reverse */
.item-reverse {
    flex-direction: row; /* Giữ row để kiểm soát padding */
}

.guide-content {
    flex: 2;
    padding-right: 40px;
}

/* Khi item reverse, đẩy padding sang phải */
.item-reverse .guide-content {
    padding-right: 0;
    padding-left: 40px;
}

.guide-content h3 {
    color: #0d5c46;
    font-size: 24px;
    margin-bottom: 15px;
}

.guide-content p {
    color: #444;
    line-height: 1.8;
    font-size: 16px;
    margin: 0;
}

.guide-icon {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.guide-icon img {
    max-width: 220px; /* Độ lớn ảnh theo mẫu */
    height: auto;
}

/* Nút bấm ở cuối */
.action-center {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.btn-main-test {
    background-color: #00c07c;
    color: white;
    text-decoration: none;
    padding: 14px 45px;
    border-radius: 50px;
    font-size: 18px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background 0.3s ease;
}

.btn-main-test:hover {
    background-color: #009d65;
}

.arrow {
    font-size: 22px;
}

/* Responsive cho điện thoại */
@media (max-width: 768px) {
    .guide-item, .item-reverse {
        flex-direction: column-reverse;
        text-align: center;
    }
    .guide-content, .item-reverse .guide-content {
        padding: 20px 0;
    }
}
.faq-container {
    max-width: 1100px;
    margin: 60px auto;
    padding: 0 40px;
    background-color: #f9f8f2; /* Màu nền kem đồng bộ với phần trên */
}

.faq-main-title {
    color: #0d5c46;
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 40px;
}

.faq-list {
    border-top: 1px solid #0d5c46; /* Đường kẻ đậm phía trên cùng */
}

.faq-item {
    border-bottom: 1px solid #ccc; /* Đường kẻ mờ giữa các câu */
    padding: 20px 0;
}

/* Kiểu dáng cho tiêu đề câu hỏi */
summary {
    list-style: none; /* Ẩn dấu mũi tên mặc định của trình duyệt */
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
    color: #0d5c46;
    cursor: pointer;
    padding: 10px 0;
}

summary::-webkit-details-marker {
    display: none;
}

/* Nội dung câu trả lời */
.faq-content {
    padding-top: 15px;
    color: #444;
    line-height: 1.6;
    font-size: 16px;
    animation: fadeIn 0.4s ease;
}

/* Tạo biểu tượng dấu + và biến thành x khi mở */
.faq-icon {
    position: relative;
    width: 20px;
    height: 20px;
}

.faq-icon::before,
.faq-icon::after {
    content: '';
    position: absolute;
    background-color: #0d5c46;
    transition: 0.3s;
}

/* Thanh ngang */
.faq-icon::before {
    top: 9px;
    left: 0;
    width: 100%;
    height: 2px;
}

/* Thanh dọc (biến mất khi mở) */
.faq-icon::after {
    top: 0;
    left: 9px;
    width: 2px;
    height: 100%;
}

/* Khi đang mở (details[open]) */
details[open] .faq-icon::after {
    transform: rotate(90deg);
    opacity: 0;
}

details[open] .faq-icon::before {
    transform: rotate(180deg);
}

/* Hiệu ứng mượt khi hiện chữ */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

</head>

<body>

<!-- ===== HERO ===== -->
<div class="hero">
    <h1>TRẮC NGHIỆM TÍNH CÁCH MBTI</h1>
    <p>Tỏa sáng năng lực nghề nghiệp</p>

    <a href="/mbti-test" class="btn-start">Làm bài test →</a>

    <div class="slider">
        <div class="slider-track">

            <!-- CARD -->
            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>INTJ - Nhà khoa học</h3>
                    <p>Chiến lược, logic</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/2DhmtJ4.png">
                <div class="card-content">
                    <h3>INFP - Người lý tưởng</h3>
                    <p>Sáng tạo, nhạy cảm</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/yK3K7bM.png">
                <div class="card-content">
                    <h3>INFJ - Người che chở</h3>
                    <p>Sâu sắc, lý tưởng</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>INTP - Nhà tư duy</h3>
                    <p>Phân tích, sáng tạo</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/yK3K7bM.png">
                <div class="card-content">
                    <h3>ENTJ - Nhà lãnh đạo</h3>
                    <p>Quyết đoán, chiến lược</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/2DhmtJ4.png">
                <div class="card-content">
                    <h3>ENTP - Nhà tranh luận</h3>
                    <p>Thông minh, linh hoạt</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>ENFJ - Người dẫn dắt</h3>
                    <p>Truyền cảm hứng</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/yK3K7bM.png">
                <div class="card-content">
                    <h3>ENFP - Người truyền cảm</h3>
                    <p>Nhiệt huyết</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/2DhmtJ4.png">
                <div class="card-content">
                    <h3>ISTJ - Người trách nhiệm</h3>
                    <p>Kỷ luật, đáng tin</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>ISFJ - Người bảo vệ</h3>
                    <p>Tận tụy, chu đáo</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/yK3K7bM.png">
                <div class="card-content">
                    <h3>ESTJ - Nhà điều hành</h3>
                    <p>Tổ chức tốt</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/2DhmtJ4.png">
                <div class="card-content">
                    <h3>ESFJ - Người chăm sóc</h3>
                    <p>Hòa đồng</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>ISTP - Nhà cơ khí</h3>
                    <p>Thực tế, linh hoạt</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/yK3K7bM.png">
                <div class="card-content">
                    <h3>ISFP - Nghệ sĩ</h3>
                    <p>Sáng tạo, nhẹ nhàng</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/2DhmtJ4.png">
                <div class="card-content">
                    <h3>ESTP - Người hành động</h3>
                    <p>Năng động</p>
                </div>
            </div>

            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>ESFP - Người trình diễn</h3>
                    <p>Vui vẻ, hoạt bát</p>
                </div>
            </div>

            <!-- Lặp lại để scroll mượt -->
            <div class="card">
                <img src="https://i.imgur.com/k5bX6zX.png">
                <div class="card-content">
                    <h3>INTJ - Nhà khoa học</h3>
                    <p>Chiến lược, logic</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ===== SECTION 2 ===== -->
<div class="mbti-section">

    <h1 class="mbti-title">Trắc nghiệm tính cách MBTI là gì?</h1>

    <div class="mbti-content">

        <div class="mbti-image">
            <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1757086816/39_szkvi5.jpg">
        </div>

        <div class="mbti-text">
            <p><strong>MBTI</strong> là phương pháp trắc nghiệm giúp phân tích tính cách con người thông qua các câu hỏi.</p>
            <p>
                Hiện nay, MBTI được coi là công cụ khám phá tính cách phổ biến và chính xác.
                Trong công việc, MBTI giúp mỗi cá nhân định hướng nghề nghiệp và lựa chọn môi trường phù hợp.
            </p>

            <p>
                Nhà tuyển dụng cũng có thể sử dụng MBTI để đánh giá mức độ phù hợp của ứng viên
                với vị trí công việc và văn hóa doanh nghiệp.
            </p>
        </div>

    </div>


</div>
<div class="section">
    <h1>Cách MBTI phân loại</h1>
    <p>MBTI chia thành 4 nhóm chính:</p>

    <div class="grid">

        <div class="card-grid">
            <div class="card-img bg-ei">
                <span>E</span>
                <span>I</span>
            </div>
            <div class="card-bottom">
                <div class="number">01</div>
                <p>Năng lượng</p>
            </div>
        </div>

        <div class="card-grid">
            <div class="card-img bg-sn">
                <span>S</span>
                <span>N</span>
            </div>
            <div class="card-bottom">
                <div class="number">02</div>
                <p>Nhận thức</p>
            </div>
        </div>

        <div class="card-grid">
            <div class="card-img bg-tf">
                <span>T</span>
                <span>F</span>
            </div>
            <div class="card-bottom">
                <div class="number">03</div>
                <p>Quyết định</p>
            </div>
        </div>

        <div class="card-grid">
            <div class="card-img bg-jp">
                <span>J</span>
                <span>P</span>
            </div>
            <div class="card-bottom">
                <div class="number">04</div>
                <p>Lối sống</p>
            </div>
        </div>

    </div>
</div>
<div class="mbti-container">
    <h1 class="main-title">16 nhóm tính cách MBTI</h1>
    <input type="radio" name="mbti-page" id="p1" checked hidden>
    <input type="radio" name="mbti-page" id="p2" hidden>
    
    <div class="mbti-grid" id="page-1">
        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-istj">
                    <h2 class="type-title color-istj">ISTJ</h2>
                    <p class="type-desc">Người trách nhiệm </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISTJ">
                    </div>
                </div>
                
                <div class="card-back bg-istj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-infp">
                    <h2 class="type-title color-infp">INFP</h2>
                    <p class="type-desc">Người lý tưởng hóa </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="INFP">
                    </div>
                </div>
                
                <div class="card-back bg-infp">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-istj">
                    <h2 class="type-title color-istj">ISFP</h2>
                    <p class="type-desc">Người nghệ sĩ </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISTJ">
                    </div>
                </div>
                
                <div class="card-back bg-istj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

       
        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-intj">
                    <h2 class="type-title color-intj">INTJ</h2>
                    <p class="type-desc">Người khoa học</p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="INTJ">
                    </div>
                </div>
                
                <div class="card-back bg-intj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-isfj">
                    <h2 class="type-title color-isfj">ISFJ</h2>
                    <p class="type-desc">Người nuôi dưỡng </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISFJ">
                    </div>
                </div>
                
                <div class="card-back bg-isfj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-istp">
                    <h2 class="type-title color-istp">ISTP</h2>
                    <p class="type-desc">Nhà kĩ thuật </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISTP">
                    </div>
                </div>
                
                <div class="card-back bg-istp">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-infj">
                    <h2 class="type-title color-infj">INFJ</h2>
                    <p class="type-desc">Người che chở </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="INFJ">
                    </div>
                </div>
                
                <div class="card-back bg-infj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-intp">
                    <h2 class="type-title color-intp">INTP</h2>
                    <p class="type-desc">Người tư duy</p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="INTP">
                    </div>
                </div>
                
                <div class="card-back bg-intp">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
     <div class="mbti-grid" id="page-2">
        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-istj">
                    <h2 class="type-title color-istj">ISTJ</h2>
                    <p class="type-desc">Người trách nhiệm </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISTJ">
                    </div>
                </div>
                
                <div class="card-back bg-istj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-infp">
                    <h2 class="type-title color-infp">INFP</h2>
                    <p class="type-desc">Người lý tưởng hóa </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="INFP">
                    </div>
                </div>
                
                <div class="card-back bg-infp">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-istj">
                    <h2 class="type-title color-istj">ISFP</h2>
                    <p class="type-desc">Người nghệ sĩ </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISTJ">
                    </div>
                </div>
                
                <div class="card-back bg-istj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

       
        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-intj">
                    <h2 class="type-title color-intj">INTJ</h2>
                    <p class="type-desc">Người khoa học</p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="INTJ">
                    </div>
                </div>
                
                <div class="card-back bg-intj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="mbti-card">
            <div class="card-inner">
                <div class="card-front border-isfj">
                    <h2 class="type-title color-isfj">ISFJ</h2>
                    <p class="type-desc">Người nuôi dưỡng </p>
                    <div class="type-img">
                        <img src="https://i.imgur.com/k5bX6zX.png" alt="ISFJ">
                    </div>
                </div>
                
                <div class="card-back bg-isfj">
                    <h3>Đặc điểm ISTJ</h3>
                    <ul>
                        <li>Thực tế & Logic</li>
                        <li>Trọng lời hứa</li>
                        <li>Thích sự ngăn nắp</li>
                    </ul>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        </div>

       

    </div>
    <div class="pagination-dots">
        <label for="p1" class="dot" id="dot-1"></label>
        <label for="p2" class="dot" id="dot-2"></label>
    </div>
</div>

<div class="guide-container">
    <h2 class="guide-title">Hướng dẫn làm trắc nghiệm MBTI để có kết quả chính xác nhất</h2>

    <div class="guide-list">
        <div class="guide-item">
            <div class="guide-content">
                <h3>Giữ tâm trạng ổn định</h3>
                <p>Kết quả của một trắc nghiệm tâm lý phụ thuộc rất nhiều vào tâm trạng của bạn, vậy nên hãy thực hiện nó trong một trạng thái tâm lý bình ổn nhất.</p>
            </div>
            <div class="guide-icon">
                <img src="https://i.imgur.com/WlG397f.png" alt="Tâm trạng">
            </div>
        </div>

        <div class="guide-item item-reverse">
            <div class="guide-icon">
                <img src="https://i.imgur.com/pZzB0B6.png" alt="Trung thực">
            </div>
            <div class="guide-content">
                <h3>Trung thực khi trả lời câu hỏi</h3>
                <p>Hãy phân biệt giữa thực tế <i>(điều thực sự mô tả bạn)</i> với lý tưởng <i>(điều bạn muốn trở thành trong mắt người khác)</i>. Kết quả của bài trắc nghiệm hoàn toàn là câu chuyện của cá nhân bạn, đừng để yếu tố bên ngoài tác động đến câu trả lời.</p>
            </div>
        </div>

        <div class="guide-item">
            <div class="guide-content">
                <h3>Kiểm tra lại định kỳ</h3>
                <p>Chúng ta trưởng thành và thay đổi từng ngày, vậy nên kết quả MBTI cũng có thể thay đổi dựa trên nhận thức và thế giới quan tại những giai đoạn khác nhau trong cuộc đời. Tốt nhất bạn hãy làm kiểm tra MBTI lại nhiều lần để có cái nhìn tổng quát và chính xác nhất.</p>
            </div>
            <div class="guide-icon">
                <img src="https://i.imgur.com/YQkR8H9.png" alt="Định kỳ">
            </div>
        </div>
    </div>

    <div class="action-center">
        <a href="#" class="btn-main-test">Làm bài test <span class="arrow">→</span></a>
    </div>
</div>
<div class="faq-container">
    <h2 class="faq-main-title">FAQs</h2>

    <div class="faq-list">
        <details class="faq-item" open>
            <summary>
                Trắc nghiệm MBTI là gì?
                <span class="faq-icon"></span>
            </summary>
            <div class="faq-content">
                <p>Trắc nghiệm tính cách MBTI <i>(Myers-Briggs Type Indicator)</i> là một phương pháp sử dụng hàng loạt các câu hỏi trắc nghiệm để phân tích tính cách con người. Kết quả trắc nghiệm MBTI chỉ ra cách con người nhận thức thế giới xung quanh và ra quyết định cho mọi vấn đề trong cuộc sống.</p>
            </div>
        </details>

        <details class="faq-item">
            <summary>
                Trắc nghiệm MBTI bắt nguồn từ đâu?
                <span class="faq-icon"></span>
            </summary>
            <div class="faq-content">
                <p>MBTI dựa trên nền tảng lý thuyết phân loại của tâm lý học gia Carl Jung và được phát triển bởi Isabel Briggs Myers cùng mẹ của bà là Katherine Cook Briggs.</p>
            </div>
        </details>

        <details class="faq-item">
            <summary>
                MBTI có bao nhiêu loại tính cách?
                <span class="faq-icon"></span>
            </summary>
            <div class="faq-content">
                <p>Có tổng cộng 16 nhóm tính cách được chia thành 4 nhóm chính: Nhà phân tích, Nhà ngoại giao, Người bảo vệ và Người khám phá.</p>
            </div>
        </details>

        <details class="faq-item">
            <summary>
                Kết quả MBTI có thay đổi không?
                <span class="faq-icon"></span>
            </summary>
            <div class="faq-content">
                <p>Kết quả có thể thay đổi tùy thuộc vào sự trưởng thành, trải nghiệm sống và trạng thái tâm lý của bạn tại thời điểm làm bài test.</p>
            </div>
        </details>

        </div>
</div>

</body>
</html>