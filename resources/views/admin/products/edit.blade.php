@extends('layouts.admin')
@section('page-content')
<div class="container pt-32">
    <h3>Config</h3>
    <div class="bread-crumb">
        <a href="{{route('categories.index')}}">Categories </a>
        <a href="{{route('subcategories.show',$product->subcategory)}}">{{$product->subcategory->name}} </a>
        {{$product->name}} :: edit
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

    <h3 class="mt-16"><span class="chevron-right"> {{$product->subcategory->category->name}} </span><span class="chevron-right"> {{$product->subcategory->name}} </span> {{$product->name}}</h3>
    <form action="{{route('products.update', $product)}}" method='post' class="flex flex-col w-full mt-8" enctype="multipart/form-data" onsubmit="return validate(event)">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-1 md:grid-cols-2 items-center">
            <div class="flex flex-col flex-1">

                <label for="" class=''>Product Name</label>
                <input type="text" id='name' name='name' class="input" placeholder="Tea Cup" value="{{$product->name}}">

                <label for="" class='mt-3'>Unit Price</label>
                <input type="number" id='unitprice' name='unitprice' class="input" placeholder="price" value="{{$product->unitprice}}">

                <div class="flex items-center space-x-8 mt-3">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-4 h-4" id='chk_color' name="has_color" onchange="toggleColor()" @if($product->color!='') checked @endif>
                        <label for="">Has Color</label>
                    </div>

                    <!-- hide color if null -->
                    @if($product->color=='')
                    <input type="color" id='color' name='color' class="input hidden" placeholder="color" value="{{$product->color}}">
                    @else
                    <input type="color" id='color' name='color' class="input" placeholder="color" value="{{$product->color}}">
                    @endif

                </div>

                <label for="" class="mt-3">Image</label>
                <input type="file" id='pic' name='image' placeholder="Image" class='py-2' onchange='preview_pic()'>

            </div>
            <div class="flex flex-col justify-center items-center">
                @if($product->image=='')
                <img src="{{asset('images/no-image.png')}}" alt="" id='preview_img' class="w-60 h-60">
                @else
                @php
                $url=asset('images/products')."/". $product->image;
                @endphp
                <img src="{{$url}}" alt="" id='preview_img' class="w-60 h-60">
                @endif
                <button type="submit" class="btn-indigo-rounded w-60 py-2 mt-4">Update Product</button>
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