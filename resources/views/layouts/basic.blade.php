<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>AJ</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <!-- <link rel="stylesheet" href="{{asset('/build/assets/app.css')}}">
    <script src="{{asset('/build/assets/app.js')}}"></script> -->
    <style>
        body {
            font-family: 'Poppins-Regular', sans-serif;
            /* overflow-x: hidden; */
        }
    </style>
</head>

<body>
    @yield('page')
    <script src="{{asset('js/sweetalert2@10.js')}}"></script>
    @yield('script')
</body>

</html>