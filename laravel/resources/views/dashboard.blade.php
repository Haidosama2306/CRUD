<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</head>

<body>
    <nav class="head">
        <div class="container">
            <div class="#">
                <ul class="header">
                    @guest
                    <li class="li-item">
                        <a class="a-home" href="{{ route('login') }}">Home</a>
                    </li>
                    <li class="li-item">
                        <a class="a-item" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                    <li class="li-item">
                        <a class="a-item" href="{{ route('user.createUser') }}">Đăng ký</a>
                    </li>
                    @else
                    <li class="li-item">
                        <a class="a-home" href="{{ route('user.list') }}">Home</a>
                    </li>
                    <li class="li-item">
                        <a class="a-item" href="{{ route('signout') }}">Đăng xuất</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer class="footer">
        <p>Lập trình web @ 2024</p>
    </footer>
</body>

</html>
