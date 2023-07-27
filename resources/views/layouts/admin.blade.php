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
@endsection