<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiring</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/job.css') }}">
        @yield('styles')

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
        <a href="{{ route('jobs.index') }}">Việc làm</a>
        <a href="#">CV</a>
        <a href="{{ route('career.index') }}">Cẩm nang nghề nghiệp</a>
        @guest

    <!-- Chưa đăng nhập -->

    <a href="{{ route('register') }}"
       class="{{ request()->routeIs('register') ? 'active-link' : '' }}">

        Đăng ký

    </a>


    <a href="{{ route('login') }}"
       class="sign-in {{ request()->routeIs('login') ? 'active-link' : '' }}">

        Đăng nhập

    </a>

@else

    <!-- Đã đăng nhập -->

    <span class="me-1">

        Xin chào,

        <a href="{{ route('profile') }}">

            <strong>{{ Auth::user()->name }}</strong>

        </a>

    </span>


    <form action="{{ route('logout') }}"
          method="POST"
          style="display:inline;">

        @csrf

        <button type="submit" class="sign-in">

            Đăng xuất

        </button>

    </form>

@endguest
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
<script>

document.querySelectorAll('.save-job-btn').forEach(button => {

    button.addEventListener('click', function () {

        let jobId = this.dataset.jobId;

        let btn = this;

        fetch(`/save-job/${jobId}`, {

            method: 'POST',

            headers: {
                'X-CSRF-TOKEN':
                    document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,

                'Accept': 'application/json'
            }

        })

        .then(response => response.json())

        .then(data => {

            // CHƯA LOGIN
            if(data.status === 'login_required'){

                window.location.href = "/login";
                return;
            }

            let icon = btn.querySelector('i');

            // SAVE
            if(data.status === 'saved'){

                btn.classList.add('saved');

                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
            }

            // REMOVE
            if(data.status === 'removed'){

                btn.classList.remove('saved');

                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
            }

        });

    });

});

</script>

</body>
</html>