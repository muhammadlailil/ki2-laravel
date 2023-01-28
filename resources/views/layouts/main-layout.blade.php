<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.css')

    @stack('css')
</head>
<body>
    @include('layouts.header')

    <h1>MAIN LAYOUT</h1>

    @yield('content')

    @include('layouts.footer')
</body>
</html>