<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            @if($config['method']=='read')
            <h5>Trang xem chi tiết</h5>
            @else
            <h5>Trang cập nhật</h5>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện:</label>
                    <input type="text" class="form-control upload-image" id="image" name="image" value="{{ old('image', ($user->image)??'') }}" data-type="Images" {{ ($config['method'] == 'read') ? 'disabled':'' }}>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name"  value="{{ old('name', ($user->name)??'') }}" {{ ($config['method'] == 'read') ? 'readonly':'' }}>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="username" name="email" value="{{ old('email', ($user->email)??'') }}" {{ ($config['method'] == 'read') ? 'readonly':'' }}>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại:</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', ($user->phone)??'') }}" {{ ($config['method'] == 'read') ? 'readonly':'' }}>
                </div>
                @if($config['method']=='update')
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nhập lại mật khẩu:</label>
                    <input type="password" class="form-control" id="repassword" name="repassword">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                @endif
                <a href="{{ route('user.index') }}" class="btn btn-success">Quay lại</a>
            </form>
        </div>
    </div>
</div>