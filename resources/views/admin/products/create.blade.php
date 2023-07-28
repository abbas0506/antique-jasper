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

    <h3 class="mt-16"><span class="chevron-right"> {{$subcategory->category->name}} </span> <span class="chevron-right"> {{$subcategory->name}} </span> New </h3>
    <form action="{{route('products.store')}}" method='post' class="flex flex-col w-full mt-4" enctype="multipart/form-data" onsubmit="return validate(event)">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 items-center">

            <div class="flex flex-col flex-1">
                <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                <label for="" class=''>Product Name</label>
                <input type="text" id='name' name='name' class="input" placeholder="Tea Cup">

                <label for="" class='mt-3'>Unit Price</label>
                <input type="number" id='price' name='price' class="input" placeholder="price">

                <label for="" class='mt-3'>Color (if any)</label>
                <div class="flex flex-wrap items-center space-x-4 mt-3">
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='black' name='color' value="1" class="chk hidden">
                        <label for="black">
                            <span class="bg-black"></span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='blue' name='color' value="2" class="w-4 h-4 chk hidden">
                        <label for="blue">
                            <span class="bg-blue-700"></span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='gray' name='color' value="3" class="w-4 h-4 chk hidden">
                        <label for="gray">
                            <span class="bg-gray-400"></span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='white' name='color' value="4" class="w-4 h-4 chk hidden">
                        <label for="white">
                            <span class="border border-slate-800 bg-white"></span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='green' name='color' value="5" class="w-4 h-4 chk hidden">
                        <label for="green">
                            <span class="bg-green-700"></span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='red' name='color' value="6" class="w-4 h-4 chk hidden">
                        <label for="red">
                            <span class="bg-red-700"></span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center color">
                        <input type="checkbox" id='yellow' name='color' value="7" class="w-4 h-4 chk hidden">
                        <label for="yellow">
                            <span class="bg-orange-300"></span>
                        </label>
                    </div>

                </div>

                <label for="" class='mt-4'>Specific to</label>
                <div class="flex items-center space-x-4 mt-4">
                    <div class="flex space-x-2 items-center gender">
                        <input type="checkbox" id='M' name="gender" value="M" class="chk hidden">
                        <label for="M">
                            <span class="bg-blue-200">M</span>
                        </label>
                    </div>
                    <div class="flex space-x-2 items-center gender">
                        <input type="checkbox" id='F' name="gender" value="F" class="chk hidden">
                        <label for="F">
                            <span class="bg-orange-200">F</span>
                        </label>
                    </div>
                </div>

                <label for="" class="mt-6">Image</label>
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
        if ($('#has_color').prop('checked'))
            $('#color-bar').show();
        else
            $('#color-bar').hide();
    }

    function preview_pic() {
        const [file] = pic.files
        if (file) {
            preview_img.src = URL.createObjectURL(file)
        }
    }

    // check only single color
    $(document).on('click', '.color .chk', function() {
        $('.color .chk').not(this).prop('checked', false);
    });

    // check only single gender
    $(document).on('click', '.gender .chk', function() {
        $('.gender .chk').not(this).prop('checked', false);
    });
</script>
@endsection