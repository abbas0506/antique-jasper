@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h4>Edit Category</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.index')}}">Categories</a>
        <div>/</div>
        <div>Edit</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <form action="{{route('admin.categories.update', $category)}}" method='post' class="flex flex-col w-full mt-16" onsubmit="return validate(event)">
        @csrf
        @method('PATCH')
        <label for="">Category Name*</label>
        <input type="text" id='name' name='name' class="custom-input mt-2" placeholder="Crockery" value="{{$category->name}}">
        <div class="mt-4">
            <button type="submit" class="btn-teal p-2">Update Now</button>
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