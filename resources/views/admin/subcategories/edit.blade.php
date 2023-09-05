@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h4>Edit Sub-Category</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.show', $subcategory->category)}}">{{$subcategory->category->name}}</a>
        <div>/</div>
        <div>{{$subcategory->name}}</div>
        <div>/</div>
        <div>Edit</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif


    <form action="{{route('admin.subcategories.update', $subcategory)}}" method='post' class="flex flex-col w-full mt-16" onsubmit="return validate(event)">
        @csrf
        @method('PATCH')
        <label for="">Sub Category Name*</label>
        <input type="text" id='name' name='name' class="input mt-2" placeholder="Cup" value="{{$subcategory->name}}">

        <div class="mt-4">
            <button type="submit" class="btn-indigo">Update Now</button>
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