@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <h3>Cart Detail</h3>
    <div class="mt-16 w-full">
        <div class="flex items-center text-sm font-semibold">
            <div class="w-24 hidden md:flex">Image</div>
            <div class="flex-1">Product</div>
            <div class="w-12 md:w-24 text-center">Price</div>
            <div class="w-12 md:w-24 text-center">Qty</div>
            <div class="w-12 md:w-24 text-center">Subtotal</div>
        </div>

        @php $total = 0; @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)

        @php
        $total += $details['price'] * $details['qty'];
        $url = asset('images/products') . "/" . $details['image'];
        @endphp

        <div class="flex items-center text-sm space-y-2">
            <div class="w-24 hidden md:flex"><img src="{{$url}}" class="w-16"></div>
            <div class="flex-1">
                <div>
                    <div>{{$details['name']}}</div>
                    <div>{{$details['code']}}</div>
                </div>

            </div>
            <div class="w-12 md:w-24 text-center">{{ $details['price'] }}</div>
            <div class="w-12 md:w-24 flex items-center">
                <i class="bi-dash"></i>
                <div class="text-center w-8">
                    {{ $details['qty'] }}
                </div>
                <i class="bi-plus"></i>
            </div>

            <div class="w-12 text-center">
                {{$details['price'] * $details['qty']}}
            </div>
        </div>
        @endforeach
        <!-- cart footer -->
        <div class="flex flex-1 mt-2 py-2 border-t text-sm font-semibold justify-end">Total: Rs. {{ $total }}</div>
        @endif

        <div class="flex flex-wrap justify-center items-center md:space-x-4 mt-4">
            <a href="{{url('/')}}" class="btn-orange">Continue Shopping <span class="chevron-right pl-2"></span></a>
            <a href="{{url('/')}}" class="btn-teal"> <i class="bi bi-check pr-2"></i>Check Out</a>
        </div>
    </div>
</div>
@endsection