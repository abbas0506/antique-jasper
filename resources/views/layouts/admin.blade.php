@extends('layouts.basic')

@section('header')
<x-admin.header></x-admin.header>
@endsection

@section('sidebar')
<x-admin.sidebar></x-admin.sidebar>
@endsection

@section('body')
<div class="responsive-body">
    @yield('page-content')
</div>

@endsection

@section('script')
@endsection