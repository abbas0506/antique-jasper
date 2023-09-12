@extends('layouts.guest')
@section('body')
<!-- Overview section -->
<section class="mt-32 mb-16">
    <div class="container">
        <h1 class="text-center text-xl font-semibold">Available Products of Selected Category</h1>
        <!-- product listing -->
        <div class="mt-16">
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8 mt-4">
                @foreach($products as $product)
                @php
                $url=asset('images/products')."/".$product->image;
                @endphp
                <div class="product-card">
                    <a href="{{route('products.show',$product)}}">
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

        <div class="mt-16">
            <h1 class="text-center text-xl font-semibold">You may also like</h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8 mt-8">

                @foreach($subcategories as $subcategory)
                @foreach($subcategory->products->take(1) as $product)
                @php
                $url=asset('images/products')."/".$product->image;
                @endphp

                <div class="product-card">
                    <a href="{{route('subcategories.show',$subcategory)}}">
                        <div class="img-container">
                            <div class="bg-img-hover-scale" style="background-image: url('{{asset($url)}}');"></div>
                        </div>
                        <div class="product-desc p-2">

                            @php
                            if(strlen($subcategory->name)>20)
                            $reducedName=substr($subcategory->name,0,20)."...";
                            else
                            $reducedName=$subcategory->name;
                            @endphp

                            <p class="text-center text-slate-900 font-semibold">{{$reducedName}} </p>
                        </div>
                    </a>
                </div>

                @endforeach
                @endforeach

            </div>
        </div>

    </div>
</section>

@endsection