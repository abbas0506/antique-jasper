@extends('layouts.admin')
@section('page-content')

<div class="container pt-16">

    <h3>Config</h3>
    <div class="bread-crumb">
        <a href="{{route('categories.index')}}" class="link"> Categories </a>
        New
    </div>

    <div class="mt-16">

        @if ($errors->any())
        <div class="alert-danger mt-8">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('categories.store')}}" method='post' class="flex flex-col w-full" onsubmit="return validate(event)">
            @csrf

            <label for="">Category Name*</label>
            <input type="text" id='name' name='name' class="input mt-2" placeholder="Crockery">

            <div class="mt-4">
                <button type="submit" class="btn-indigo-rounded">Save Category</button>
            </div>
        </form>
    </div>

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