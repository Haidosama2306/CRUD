@extends('dashboard')

@section('content')
<div class="regis-card">
    <h3 class="title-header">Màn hình đăng ký</h3>
    <div class="card-body">
        <form action="{{ route('user.postUser') }}" method="POST">
            @csrf
            <div class="input">
            <label for="name">Username</label>
                <input type="text" placeholder="username" id="name" name="name" required autofocus>
            </div>
            <div class="input">
            <label for="email">Email</label>
                <input type="text" placeholder="Email" id="email_address" name="email" required
                    autofocus>
            </div>
            <div class="input">
            <label for="password">Mật khẩu</label>
                <input type="password" placeholder="Mật khẩu" id="password" name="password"
                    required>
            </div>
            <div class="input">
            <label for="password">Nhập lại mật khẩu</label>
                <input type="password" placeholder="Nhập lại mật khẩu" id="password_confirmation" name="password_confirmation"
                    required>
            </div>
            <div class="submit">
                <a href="{{ route('login') }}">Đã có tài khoản</a>
                <button type="submit" class="btn btn-dark btn-block">Đăng ký</button>
            </div>
        </form>
    </div>
</div>
@endsection
