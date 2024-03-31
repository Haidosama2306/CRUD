@extends('dashboard')

@section('content')
<div class="update-card">
    <h3 class="title-header">Màn hình cập nhật</h3>
    <div class="card-body">
        <form action="{{ route('user.postUpdateUser') }}" method="POST">
            @csrf
            <input name="id" type="hidden" value="{{$user->id}}">
            <div class="input">
            <label for="name">Username</label>
                <input type="text" placeholder="Name" id="name" name="name"
                    value="{{ $user->name }}" required autofocus>
            </div>
            <div class="input">
            <label for="email">Email</label>
                <input type="text" placeholder="Email" id="email_address"
                    value="{{ $user->email }}" name="email" required autofocus>
            </div>
            <div class="input">
            <label for="password">Mật Khẩu</label>
                <input type="password" placeholder="Mật khẩu" id="password" name="password"
                    required>
            </div>
            <div class="input">
            <label for="password">Nhập lại mật khẩu</label>
                <input type="password" placeholder="nhập lại mật khẩu" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection
