@extends('layouts.admin')
@section('page-content')
<section class="m-8">
    <h1 class="page-title">Site Configuration</h1>
    <div class="bread-crumb">
        <a href="{{route('config.index')}}"> Config </a> >
        <a href="{{route('countries.index')}}">Countries </a> >
        new
    </div>
    <div class="container md:w-3/4 mx-auto px-5 mt-16">

        @if ($errors->any())
        <div class="alert-danger mt-8">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('countries.store')}}" method='post' class="flex flex-col w-full" onsubmit="return validate(event)">
            @csrf

            <label for="" class='mt-8'>Country Name</label>
            <input type="text" id='name' name='name' class="input" placeholder="Pakistan">

            <div class="flex items-center justify-end mt-4 py-2">
                <button type="submit" class="btn-indigo-rounded">Save</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('script')
<script>
    function validate(event) {
        var name = $('#name').val()
        var validated = true;
        if (name == '') {
            validated = false
            Swal.fire({
                icon: 'warning',
                title: "Required input missing!",
                timer: 1500,
            });
        }
        return validated;

    }
</script>
@endsection