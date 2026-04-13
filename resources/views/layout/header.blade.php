<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>FPT Hiring</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bootstrap + Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        /* HEADER */
        .custom-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: rgba(255,255,255,0.95);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #3b71e4;
        }

        .sign-in {
            background: #3b71e4;
            color: #fff !important;
            padding: 6px 12px;
            border-radius: 5px;
        }

        .custom-navbar.scrolled {
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="custom-navbar">
    <a href="#" class="logo">
        <img src="https://res.cloudinary.com/dumvx2lsj/image/upload/v1754274553/FPT_logo_2010.svg_joiycj.png"
             style="height:50px;">
        <span style="font-size:20px;font-weight:bold;color:#3b71e4;margin-left:10px;">
            Hiring
        </span>
    </a>

    <div class="nav-links">
        <a href="#">Trang chủ</a>
        <a href="#">Việc làm</a>
        <a href="#">Về chúng tôi</a>
        <a href="/register">Đăng ký</a>
        <a href="/login" class="sign-in">Đăng nhập</a>
    </div>
</div>

<!-- CONTENT -->
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    window.addEventListener("scroll", function() {
        let navbar = document.querySelector(".custom-navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>

</body>
</html>