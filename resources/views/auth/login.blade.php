@extends('layouts.basic')
@section('page')
<div class="flex flex-col md:flex-row justify-center h-screen w-screen bg-no-repeat bg-center" style="background-image: linear-gradient(rgba(0, 204, 102, 0.1), rgba(0, 204, 100, 0.2)), url('/images/cart1.png');">
    <div class="flex flex-col flex-1 items-center justify-center">
        <div class="w-1/3 mb-8">
            <img src="{{asset('/images/cart.png')}}" alt="">
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-green-700">Website Name</h1>
        <p class="text-2xl md:text-4xl font-thin text-green-700">Website Description</p>
    </div>
    <div class="flex flex-col items-center justify-center flex-1">
        <div class="w-4/5 md:w-2/3">

            <form action="{{url('login')}}" method="post" onsubmit="return validate(event)">
                @csrf
                <div class="text-green-800 text-3xl font-bold border-b border-green-800 pb-4 w-min">Login</div>

                <div class="flex items-center text-slate-600 mt-16">
                    <!-- user icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <div class="w-full">
                        <input type="text" id='email' name='email' class='w-full' placeholder="Enter use id">
                    </div>
                </div>
                <div class="flex items-center mt-2 w-full">
                    <!-- key icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 -rotate-90 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>

                    <div class="w-full">
                        <input type="password" id='password' name='password' class="w-full" placeholder="Enter use id">
                        <!-- if validation error -->
                        @if ($errors->any())
                        <div class="text-red-600 text-sm mt-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="flex justify-end mt-5 w-full">
                    <button type="submit" class="btn-green">Submit</button>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
@section('script')
<script lang="javascript">
    function validate(event) {
        validated = true;
        var email = $('#email').val();
        var password = $('#password').val();
        if (email == '' || password == '') {
            Swal.fire({
                icon: 'warning',
                text: 'Something missing',
            });
            validated = false;
        }

        return validated;
    }
</script>
@endsection