@extends('layout.header')

@section('content')

<style>
    .page-auth {
        min-height: 100vh;
        background: url("https://i.pinimg.com/1200x/27/08/3b/27083bf968836ffd6080e2e6f557dc51.jpg") no-repeat center/cover;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 90px;
    }

    .login-box {
        width: 400px;
        padding: 40px;
        background: rgba(0,0,0,0.6);
        border-radius: 15px;
        color: #fff;
        box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        backdrop-filter: blur(10px);
    }

    .login-box h2 {
        text-align: center;
        margin-bottom: 25px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: none;
        border-bottom: 1px solid #ccc;
        background: transparent;
        color: #fff;
        outline: none;
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        background: #3b71e4;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #2c5cd6;
    }

    .error {
        color: #ff4d4d;
        text-align: center;
        margin-bottom: 10px;
    }

    .register-link {
        text-align: center;
        margin-top: 15px;
    }

    .register-link a {
        color: #ff9c08;
        text-decoration: none;
    }
</style>

<div class="page-auth">
    <div class="login-box">

        <h2>Đăng nhập</h2>

        {{-- thông báo lỗi --}}
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <input type="email" name="email" placeholder="Nhập email" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>

            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>

        <div class="register-link">
            Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a>
        </div>

    </div>
</div>

@endsection