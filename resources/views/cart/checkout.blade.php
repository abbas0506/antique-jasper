@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 divide-x">
        <div class="md:col-span-2">
            <h2 class="text-center">Antique Jasper</h2>
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif
            <h5 class="mt-8">Shipping Address</h5>
            <form action="{{route('orders.store')}}" method="post">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1 mt-8">
                    <div class="">
                        <label for="">Your Name</label>
                        <input type="text" name='customer_name' class="custom-input">
                    </div>
                    <div class="">
                        <label for="">City</label>
                        <input type="text" name='city' class="custom-input">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="">Shipping Address</label>
                        <input type="text" name='shipping_address' class="custom-input">
                    </div>

                    <div class="">
                        <label for="">Phone</label>
                        <input type="text" name='phone' class="custom-input">
                    </div>
                    <div class="">
                        <label for="">Email (optional)</label>
                        <input type="text" name='email' class="custom-input">
                    </div>
                </div>
                <div class="flex justify-center mt-8">
                    <button class="btn-teal">Submit Now</button>
                </div>
            </form>
        </div>
        <div class="flex flex-col justify-center items-center px-8">
            @php

            $total=0;
            if(session('cart')){
            foreach(session('cart') as $id => $details)
            $total += $details['price'] * $details['qty'];
            }
            @endphp

            <label>Total Amount</label>
            <h4>Rs. {{ $total }}</h4>
            <div class="text-xs mt-8">*Amount is recieved through JazzCash</div>
            <a href="{{url('cart/show')}}" class="hover:bg-slate-200 mt-8 px-4 tracking-widest">VIEW CART</a>
        </div>

    </div>
</div>
@endsection