@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h4>New Category</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.index')}}">Categories</a>
        <div>/</div>
        <div>New</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <form action="{{route('admin.categories.store')}}" method='post' class="flex flex-col mt-16" onsubmit="return validate(event)">
        @csrf

        <label for="">Category Name*</label>
        <input type="text" id='name' name='name' class="input mt-2" placeholder="Crockery">

        <div class="mt-4">
            <button type="submit" class="btn-teal p-2">Save Now</button>
        </div>
    </form>
</div>

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