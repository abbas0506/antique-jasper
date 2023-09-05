@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h4>New Sub-Category</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.show',$category)}}">{{$category->name}}</a>
        <div>/</div>
        <div>New Sub-Category</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif


    <div class="mt-16">
        <h4>Category : {{$category->name}}</h4>
        <form action="{{route('admin.subcategories.store')}}" method='post' class="flex flex-col w-full mt-8" onsubmit="return validate(event)">
            @csrf
            <input type="hidden" name="category_id" value="{{$category->id}}">
            <label for="">Sub Category Name</label>
            <input type="text" id='name' name='name' class="custom-input mt-2" placeholder="Spoon">

            <div class="mt-4">
                <button type="submit" class="btn-teal p-2">Create Now</button>
            </div>
        </form>
    </div>
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