@extends('layouts.guest')

@section('body')
<!-- hero section -->
@php
$url=asset('images/ring.png');
@endphp

<section class="h-screen bg-orange-50 bg-right-bottom bg-no-repeat" style="background-image: url('{{$url}}');">
    <div class="flex w-full md:w-1/2 h-full items-center">
        <div class="pl-4 md:pl-24 mt-16">
            <h1 class="text-center md:text-left">ANTIQUE JASPER</h1>
            <p class="text-xl mt-6">We have a unique collection of 1000+ items for you with reasonable price. We believe in our prolonged customer relations. Feel free to place your order; shipment is free on the order of two or more items.</p>
        </div>

    </div>
</section>

<!-- featured items section -->
<section class="mt-24">
    <div class="container">
        <div class="flex flex-col justify-center items-center">
            <h2>Our Featured Collection</h1>
                <p class="text-xl mt-4 text-center">We have top featured collection of gold rings, stone, artificial jewellery both for men and women. </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 w-full mt-24">
            <!-- item  -->
            <div class="relative border">
                <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                    <a href="{{route('products.filter',['G','F'])}}" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                        <i class="bi bi-cart2"></i>
                    </a>
                </div>
                <div class="absolute top-6 left-6">
                    <h2 class="text-xl font-semibold">Women</h2>
                    <h3 class="text-sm text-slate-600">Spring 2023</h3>
                </div>
                <img src="{{asset('images/woman.png')}}" alt="">
            </div>
            <div class="relative border">
                <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                    <a href="{{route('products.filter',['G','M'])}}" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                        <i class="bi bi-cart2"></i>
                    </a>
                </div>
                <div class="absolute top-6 left-6">
                    <h2 class="text-xl font-semibold">Men</h2>
                    <h3 class="text-sm text-slate-600">Spring 2023</h3>
                </div>
                <img src="{{asset('images/man.png')}}" alt="">
            </div>
            <div class="relative border">
                <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                    <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                        <i class="bi bi-cart2"></i>
                    </a>
                </div>
                <div class="absolute top-6 left-6">
                    <h2 class="text-xl font-semibold">Custom</h2>
                    <h3 class="text-sm text-slate-600">Spring 2023</h3>
                </div>
                <img src="{{asset('images/bottle.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Overview section -->
<section class="my-24">
    <div class="container">
        <h1 class="text-4xl font-bold">Product Overview</h1>
        <!-- product navbar -->
        <div class="flex flex-wrap w-full justify-between mt-8">
            <nav id='product-nav'>
                <ul>
                    <li class="active">All Products</li>

                </ul>
            </nav>
            <div class="flex flex-wrap space-x-4">
                <div class="flex justify-center items-center px-4 py-2 border rounded-sm hover:bg-indigo-500 hover:text-white">
                    <i class="bi bi-filter mr-2"></i>
                    <p>Filter</p>
                </div>
            </div>
        </div>
        <!-- product listing -->
        <div class="mt-16">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">

                @foreach($subcategories as $subcategory)
                @foreach($subcategory->products->take(1) as $product)
                @php
                $url=asset('images/products')."/".$product->image;
                @endphp

                <div class="relative border h-32 sm:h-48 w-32 sm:w-48">
                    <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                        <a href="{{route('subcategories.show',$subcategory)}}" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                            <i class="bi bi-cart2"></i>
                        </a>
                    </div>

                    @php
                    if(strlen($subcategory->name)>30)
                    $reducedName=substr($subcategory->name,0,30)."...";
                    else
                    $reducedName=$subcategory->name;
                    @endphp

                    <div class="absolute top-6 left-6">
                        <h5>{{$reducedName}}</h5>
                        <!-- <h3 class="text-sm text-slate-600">Spring 2023</h3> -->
                    </div>
                    <img src="{{$url}}" alt="img" class="w-full h-full">
                </div>

                @endforeach
                @endforeach

            </div>

        </div>

        <div class="flex justify-center items-center mt-16 ">
            <button class="flex justify-center items-center rounded-full px-6 py-2 border-[1px] hover:bg-black hover:text-slate-300">Load More</button>
        </div>
    </div>
</section>
@endsection