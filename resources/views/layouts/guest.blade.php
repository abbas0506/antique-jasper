@extends('layouts.basic')
@section('header')
<x-guest.header></x-guest.header>
@endsection
@section('body')
@endsection
@section('footer')
<x-guest.footer></x-guest.footer>
@endsection

@section('script')
<script type="module">
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