<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Title</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <!-- <link rel="stylesheet" href="{{asset('/build/assets/app.css')}}">
    <script src="{{asset('/build/assets/app.js')}}"></script> -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @yield('page')
    <script src="{{asset('js/sweetalert2@10.js')}}"></script>
    @yield('script')
</body>

</html>