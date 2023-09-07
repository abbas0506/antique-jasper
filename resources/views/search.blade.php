@extends('layouts.guest')
@section('body')

<!-- Overview section -->
<section class="mt-32 mb-16">
    <div class="container">
        <h1 class="text-center text-xl font-semibold">Search result for "{{$searchby}}"</h1>
        <!-- product listing -->
        <div class="mt-16">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                @foreach($products as $product)
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
        <div class="mt-16">
            <h1 class="text-center text-xl font-semibold">You would also like to buy</h1>
        </div>
    </div>
</section>
@endsection