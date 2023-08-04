@extends('layouts.admin')
@section('page-content')

<div class="container ">

    <h3>Config</h3>
    <div class="bread-crumb">
        <a href="{{route('categories.index')}}">Categories </a>
        New Sub-category
    </div>

    @if ($errors->any())
    <div class="alert-danger mt-8">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mt-16">
        <h3>{{$category->name}}</h3>
        <form action="{{route('subcategories.store')}}" method='post' class="flex flex-col w-full mt-8" onsubmit="return validate(event)">
            @csrf
            <input type="hidden" name="category_id" value="{{$category->id}}">
            <label for="">Sub Category Name</label>
            <input type="text" id='name' name='name' class="input mt-2" placeholder="Spoon">

            <div class="mt-4">
                <button type="submit" class="btn-indigo-rounded">Add New Sub-Category</button>
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