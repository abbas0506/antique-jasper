@extends('layouts.admin')
@section('page-content')
<div class="container pt-16">
    <h3>Config</h3>
    <div class="bread-crumb">
        <a href="{{route('categories.index')}}">Categories </a>
        {{$category->name}} :: edit
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

    <form action="{{route('categories.update', $category)}}" method='post' class="flex flex-col w-full mt-16" onsubmit="return validate(event)">
        @csrf
        @method('PATCH')
        <label for="">Category Name*</label>
        <input type="text" id='name' name='name' class="input mt-2" placeholder="Crockery" value="{{$category->name}}">
        <div class="mt-4">
            <button type="submit" class="btn-indigo-rounded">Update Category</button>
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