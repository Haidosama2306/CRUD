@extends('dashboard')

@section('content')
<div class="login-card">
    <h3 class="title-header">Màn hình đăng nhập</h3>
    <div class="card-body">
        <form method="POST" action="{{ route('user.authUser') }}">
            @csrf
            <div class="input">
                <label for="email">Email</label>
                <input type="text" placeholder="Email" id="email" name="email" required autofocus>
            </div>
            <div class="input">
                <label for="password">Mật khẩu</label>
                 <input type="password" placeholder="Mật khẩu" id="password"
                    name="password" required>
            </div>
            <div class="remember-me">
                <label>
                    <input type="checkbox" name="remember">
                    <label for="remember">Ghi nhớ mật khẩu</label>
                </label>
            </div>
            <div class="submit">
                <a href="#">Quên mật khẩu</a>
                <button type="submit" class="btn btn-dark btn-block">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>

@endsection
