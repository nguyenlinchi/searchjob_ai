<form method="POST" action="/login">
    @csrf

    <h2>Đăng nhập</h2>

    <input type="email" name="email" placeholder="Email"><br><br>

    <input type="password" name="password" placeholder="Password"><br><br>

    <button type="submit">Đăng nhập</button>

    <p style="color:red">{{ session('error') }}</p>
</form>