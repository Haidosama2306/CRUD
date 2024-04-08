
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
                    <div class="card">
                        <div class="card-header bg-primary text-white">Màn hình đăng nhập</div>
                        <div class="card-body">
                            <form action="{{ route('auth.login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="username" name="email"  value="{{ old('email') }}">

                                    @if($errors->has('email'))
                                    <span class="error-message">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @if($errors->has('password'))
                                    <span class="error-message">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">Nhớ đăng nhập</label>
                                </div> -->
                                <button type="submit" class="btn btn-primary" name="btnSubmit">Đăng nhập</button>
                                <a href="{{ route('auth.register.admin') }}" class="btn btn-success">Đăng ký</a>
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