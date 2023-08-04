@extends('layouts.admin')
@section('page-content')
<section class="p-8">
    <h1 class="page-title">Products</h1>
    <p class="bread-crumb">Login > products</p>

    <div class="container ">
        @foreach($categories as $category)
        <div class="collapsible">
            <div class="head">
                <h3>
                    {{$category->name}}
                    <span class="text-xs ml-4 font-thin"></span>
                </h3>
                <i class="bi bi-chevron-compact-down text-lg"></i>
            </div>
            <div class="body">
                @foreach($category->subcategories as $subcategory)
                <a href="{{route('subcategories.show',$subcategory)}}" class="text-blue-600 hover:text-blue-800 hover:underline hover:underline-offset-4 py-2">{{$subcategory->name}}</a>
                @endforeach

            </div>
        </div>
        @endforeach
    </div>

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
                        <div class="text-xs text-slate-500">Price: Rs. {{$product->price}}/-</div>
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