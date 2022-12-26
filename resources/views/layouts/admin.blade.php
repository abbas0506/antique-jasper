@extends('layouts.basic')
@section('page')

<div class="w-1/5 h-screen fixed">
    <x-admin.sidebar></x-admin.sidebar>
</div>
<div class="flex w-screen min-h-screen">
    <div class="w-1/5"></div>
    <div class="flex flex-col flex-1 min-h-full bg-slate-100">
        <x-admin.header></x-admin.header>
        @yield('data')


    </div>
</div>


@endsection