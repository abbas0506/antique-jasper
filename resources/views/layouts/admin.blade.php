@extends('layouts.basic')
@section('body')

@section('header')
<x-admin.header></x-admin.header>
@endsection

@section('sidebar')
<x-admin.sidebar></x-admin.sidebar>
@endsection

@yield('page-content')

@endsection

@section('script')
<script>
    $(window).scroll(function() { // this will work when your window scrolled.
        var height = $(window).scrollTop(); //getting the scrolling height of window
        if (height > 10) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
    });
</script>
@endsection