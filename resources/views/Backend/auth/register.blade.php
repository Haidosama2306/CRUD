
<!DOCTYPE html>
<html lang="en">
<head>
    @include('Backend.dashboard.component.header')
</head>
<body>
    <div class="bg-light">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-primary text-white">Màn hình đăng ký</div>
                        <div class="card-body">
                            <form action="{{ route('auth.create') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ảnh đại diện:</label>
                                    <input type="text" class="form-control upload-image" id="image" name="image" value="{{ old('image') }}" data-type="Images">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="username" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại:</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Nhập lại mật khẩu:</label>
                                    <input type="password" class="form-control" id="repassword" name="repassword">
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                                <a href="{{ route('auth.login.admin') }}" class="btn btn-success">Đã có tài khoản</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Backend.dashboard.component.footer')
    @include('Backend.dashboard.component.script')
</body>
</html>