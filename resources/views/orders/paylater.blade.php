@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container py-32 h-[98vh]">
    <div class="flex flex-col justify-center items-center w-full h-full">
        <h2 class="text-teal-800 mt-4">Thanks for your order!</h2>
        <div class="flex items-center justify-center space-x-2 mt-4">
            <div class="text-center">Order #: </div>
            <div>{{ $order->tracking_id }}</div>
        </div>
        <div class="border-y flex flex-col justify-center items-center p-4 mt-4">
            <div class="text-xs">You can pay later at any time within 30 days of your order date. Orders are delivered only after payment confirmation.</div>

        </div>

    </div>
</div>
@endsection