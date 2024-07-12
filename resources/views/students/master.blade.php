<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý sinh viên</title>
    {{-- <link rel="stylesheet" href="https://cdn"> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
