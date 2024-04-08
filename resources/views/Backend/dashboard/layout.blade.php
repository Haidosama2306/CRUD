
<!DOCTYPE html>
<html lang="en">
<head>
    @include('Backend.dashboard.component.header')
</head>
<body>
    <div class="bg-light">
        @include('Backend.dashboard.component.nav')
    </div>
    @include($template)
    @include('Backend.dashboard.component.footer')
    @include('Backend.dashboard.component.script')
</body>
</html>