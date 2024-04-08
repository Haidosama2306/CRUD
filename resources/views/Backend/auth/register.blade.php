
<!DOCTYPE html>
<html lang="en">
<head>
    @include('Backend.dashboard.component.header')
</head>
<body>
    <div class="bg-light">
        @include('Backend.dashboard.component.nav')
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Màn hình đăng ký</div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Nhập lại mật khẩu:</label>
                                    <input type="password" class="form-control" id="repassword" name="repassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="btnSubmit">Đăng ký</button>
                                <a href="login.html" class="btn btn-success">Đã có tài khoản</a>
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