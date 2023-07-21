@extends('layouts.admin')
@section('page-content')
<section class="p-8">
    <h1 class="page-title">Products</h1>
    <p class="bread-crumb">Login > products</p>
    <div class="flex flex-col mb-4 mt-12">
        @foreach($categories as $category)
        <div class="flex text-xl tracking-wider text-red-700 border-b">{{$category->name}}</div>
        @foreach($category->subcategories as $subcategory)
        <div class="flex flex-col w-full mt-8">
            <a href="{{route('products.add', $subcategory)}}">+</a>
            <div class="text-indigo-600 font-thin">{{$subcategory->name}}</div>
            <div class="text-sm">[{{$subcategory->category->name}}]</div>
            <div class="grid grid-cols-4 gap-5 w-3/4 mx-auto my-12">

                @foreach($subcategory->products as $product)
                @php
                $url=asset('images/products')."/".$product->image;
                @endphp

                <div class="flex flex-col shadow-lg justify-evenly items-center hover:scale-110 transition-all duration-500 ease-in-out">
                    <img src="{{$url}}" alt="" id='' class="w-full h-2/3">
                    <div class="flex flex-col justify-center items-center text-center">
                        <div class="text-xs text-slate-800">{{$product->name}}</div>
                        <div class="text-xs text-slate-500">Price: Rs. {{$product->unitprice}}/-</div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        @endforeach
    </div>


</section>
<!-- recent orders -->
<section class="shadow-lg mx-8 p-5">

</section>
@endsection