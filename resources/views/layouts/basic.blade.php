<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>AJ</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    @vite(['resources/js/app.js','resources/css/app.css'])
</head>

<body>

    @yield('header')
    @yield('sidebar')

    @yield('body')
    @yield('footer')
    <script src="{{asset('js/sweetalert2@10.js')}}"></script>
    <script src="{{asset('js/collapsible.js')}}"></script>
    <script src="{{asset('js/responsive.js')}}"></script>
    @yield('script')
</body>

</html>