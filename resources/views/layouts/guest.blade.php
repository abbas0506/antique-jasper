@extends('layouts.basic')
@section('header')
<x-guest.header></x-guest.header>
@endsection
@section('sidebar')
<x-guest.sidebar></x-guest.sidebar>
@endsection

<div class="responsive-body">
    @yield('responsive-body')
</div>

@section('footer')
<x-guest.footer></x-guest.footer>
@endsection

@section('script')
@endsection