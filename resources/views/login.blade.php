@extends('layouts.guest')
@section('header')
@endsection
@section('body')
<div class="container flex flex-col justify-center items-center max-w-screen h-screen bg-orange-50">
    <div class="flex flex-col justify-center items-center md:w-1/3">
        <img src="{{asset('/images/logo.png')}}" alt="" class="h-60">
        <!-- if validation error -->
        @if ($errors->any())
        <div class="text-blue-600 text-sm mt-1">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{url('login')}}" method="post" class="w-full">
            @csrf
            <div class="grid grid-cols-1 gap-y-6 mt-8">
                <div class="relative">
                    <i class="bi bi-person absolute top-[9px] left-2"></i>
                    <input type="text" id='email' name='email' class='input pl-8 w-full' placeholder="Email*">
                </div>
                <div class="relative">
                    <i class="bi bi-key rotate-45 absolute top-[9px] left-2"></i>
                    <input type="password" id='password' name='password' class="input pl-8 w-full" placeholder="Password*">

                </div>

                <button type="submit" class="p-2 border hover:bg-slate-800 hover:border-slate-800 hover:text-slate-200">Submit</button>

            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@endsection