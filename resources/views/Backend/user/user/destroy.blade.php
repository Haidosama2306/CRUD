<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <h5>Trang xóa</h5>
            <form action="{{ route('user.delete', $user->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name"  value="{{ old('name', ($user->name)??'') }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="username" name="email" value="{{ old('email', ($user->email)??'') }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại:</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', ($user->phone)??'') }}" disabled>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa user có tên là: {{ $user->name }} này?');">Xóa user</button>
                <a href="{{ route('user.index') }}" class="btn btn-success">Quay lại</a>
            </form>
        </div>
    </div>
</div>