@extends('layouts.guest')

@section('body')
<!-- hero section -->
@php
$url=asset('images/ring.png');
@endphp

<!-- <section class="h-screen bg-orange-50 bg-right-bottom bg-no-repeat" style="background-image: url('{{$url}}');">
    <div class="flex w-full md:w-1/2 h-full items-center">
        <div class="pl-4 md:pl-24 mt-16">
            <h1 class="text-center md:text-left">ANTIQUE JASPER</h1>
            <p class="text-xl mt-6">We have a unique collection of 1000+ items for you with reasonable price. We believe in our prolonged customer relations. Feel free to place your order; shipment is free on the order of two or more items.</p>
        </div>

    </div>
</section> -->

<!-- Overview section -->
<section class="mt-60">
    <div class="container">
        <h1 class="text-3xl font-semibold">In stock products of "{{$subcategory->name}}"</h1>
        <!-- product listing -->
        <div class="mt-16">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                @foreach($subcategory->products as $product)
                @php
                $url=asset('images/products')."/".$product->image;
                @endphp
                <div class="product-card">
                    <a href="{{route('articles.show',$product)}}">
                        <div class="img-container">
                            <div class="bg-img-hover-scale" style="background-image: url('{{asset($url)}}');"></div>
                            <div class="cart-icon">
                                <a href="{{route('cart.add', $product->id)}}">
                                    <i class="bi bi-cart2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-desc p-2">

                            @php
                            if(strlen($product->name)>30)
                            $reducedName=substr($product->name,0,30)."...";
                            else
                            $reducedName=$product->name;
                            @endphp

                            <p class="text-xs md:text-sm text-slate-900">{{$reducedName}} </p>
                            <p class="mt-1 text-xs  text-slate-600">AJ#{{$product->code}} &nbsp PKR {{$product->price}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>

        <div class="flex justify-center items-center mt-16 ">
            <button class="flex justify-center items-center rounded-full px-6 py-2 border-[1px] hover:bg-black hover:text-slate-300">Load More</button>
        </div>
    </div>
</section>
@endsection