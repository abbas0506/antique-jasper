@extends('layouts.admin')
@section('page-content')

<div class="container bg-slate-100">
    <h4>Edit Order</h4>
    <div class="bread-crumb">
        <a href="/" class="link">Home</a>
        <div>/</div>
        <div>{{ $order->tracking_id }}</div>
        <div>/</div>
        <div>Change Shippig Address</div>
    </div>

    <h3 class="mt-4 text-center tracking-wider">Order # {{ $order->tracking_id }}</h3>
    <div class="text-center mt-1">{{ $order->created_at }}</div>
    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <form action="{{route('admin.orders.update', $order)}}" method='post' class="flex flex-col w-full mt-16" onsubmit="return validate(event)">
        @csrf
        @method('PATCH')
        <label for="">Shipping Address</label>
        <input type="text" id='name' name='shipping_address' class="custom-input mt-2" placeholder="Shipping address" value="{{ $order->shipping_address }}">
        <div class="mt-4">
            <button type="submit" class="btn-teal p-2">Update Now</button>
        </div>
    </form>

</div>
@endsection