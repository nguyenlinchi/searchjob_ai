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

    .container-auth {
        width: 900px;
        display: flex;
        background: rgba(0,0,0,0.6);
        border-radius: 15px;
        overflow: hidden;
        color: #fff;
        box-shadow: 0 8px 25px rgba(0,0,0,0.5);
    }

    .auth-left {
        width: 50%;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .auth-left h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .auth-right {
        width: 50%;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        padding: 40px;
    }

    .auth-right h2 {
        text-align: center;
        margin-bottom: 25px;
    }

    .input-group {
        margin-bottom: 18px;
    }

    .input-group label {
        font-size: 14px;
    }

    .input-group input,
    .input-group select {
        width: 100%;
        padding: 10px;
        border: none;
        border-bottom: 1px solid #ccc;
        background: transparent;
        color: #fff;
        outline: none;
    }

    .btn-submit {
        background: #ff9c08;
        padding: 12px;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: #e68900;
    }

    .login-link {
        text-align: center;
        margin-top: 10px;
    }

    .error {
        color: red;
        text-align: center;
    }

    .success {
        color: lightgreen;
        text-align: center;
    }
</style>

<div class="page-auth">
    <div class="container-auth">

        <!-- LEFT -->
        <div class="auth-left">
            <h2>Welcome <br>To Our Website</h2>
            <p>
                Khám phá những tiện ích và trải nghiệm tuyệt vời. 
                Hãy đăng ký tài khoản để bắt đầu!
            </p>
        </div>

        <!-- RIGHT -->
        <div class="auth-right">
            <h2>Đăng ký</h2>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif

            @if(session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <label>Họ và Tên</label>
                    <input type="name" name="name" placeholder="Nhập họ và tên" required>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Nhập email" required>
                </div>

                <div class="input-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                </div>

                <div class="input-group">
                    <label>Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                </div>

                <div class="input-group">
                    <label>Vai trò</label>
                    <select name="role">
                        <option value="CANDIDATE">Ứng viên</option>
                        <option value="EMPLOYER">Nhà tuyển dụng</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Đăng ký</button>

                <div class="login-link">
                    Đã có tài khoản? <a href="/login">Đăng nhập</a>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection