@extends('layouts.admin')
@section('page-content')
<div class="container pt-32">
    <h3>Config</h3>
    <div class="bread-crumb">
        <a href="{{route('categories.index')}}">Categories </a>
        {{$subcategory->name}} :: New Product
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

    <h3 class="mt-16">New Product</h3>
    <form action="{{route('products.store')}}" method='post' class="flex flex-col w-full" enctype="multipart/form-data" onsubmit="return validate(event)">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 items-center">

            <div class="flex flex-col flex-1">
                <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                <label for="" class=''>Product Name</label>
                <input type="text" id='name' name='name' class="input" placeholder="Tea Cup">

                <label for="" class='mt-3'>Unit Price</label>
                <input type="number" id='price' name='price' class="input" placeholder="price">

                <div class="flex items-center space-x-8 mt-3">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-4 h-4" id='chk_color' name="has_color" onchange="toggleColor()">
                        <label for="">Has Color</label>
                    </div>

                    <input type="color" id='color' name='color' class="input hidden" placeholder="color">

                </div>

                <label for="" class="mt-3">Image</label>
                <input type="file" id='pic' name='image' placeholder="Image" class='py-2' onchange='preview_pic()' required>

            </div>
            <div class="flex flex-col justify-center items-center">
                <img src="{{asset('images/no-image.png')}}" alt="" id='preview_img' class="w-60">
                <button type="submit" class="btn-indigo-rounded w-60 py-2 mt-4">Save Product</button>
            </div>
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

    function toggleColor() {
        if ($('#chk_color').prop('checked'))
            $('#color').show();
        else
            $('#color').hide();
    }

    function preview_pic() {
        const [file] = pic.files
        if (file) {
            preview_img.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection