@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h4>View Order</h4>
    <div class="bread-crumb">
        <a href="/" class="link">Home</a>
        <div>/</div>
        <div>{{ $order->tracking_id }}</div>
        <div>/</div>
        <div>View</div>
    </div>

    <h3 class="mt-4 text-center tracking-wider">Order # {{ $order->tracking_id }}</h3>
    <div class="text-center mt-1">{{ $order->created_at }}</div>
    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="mt-8">
        <label for="">{{ $order->order_details->count() }} products ordered</label>

    </div>
    <div class="overflow-x-auto w-full mt-2">
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="w-8">#</th>
                    <th class="w-12">Code</th>
                    <th class="w-48 text-left">Product</th>
                    <th class="w-16">Price</th>
                    <th class="w-12">Qty</th>
                    <th class="w-20">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach($order->order_details as $order_detail)
                <tr class="tr text-sm">
                    <td>{{$i++}}</td>
                    <td>{{ $order_detail->product->code }}</td>
                    <td class="text-left">{{ $order_detail->product->name }}</td>
                    <td>{{ $order_detail->product->price }}</td>
                    <td>{{ $order_detail->qty }}</td>
                    <td>{{ $order_detail->qty * $order_detail->product->price }}</td>
                </tr>
                @endforeach
                <tr class="border-t font-semibold">
                    <td colspan="5" class="text-right">Grand Total:</td>
                    <td>Rs. {{ $order->amount() }} /-</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($order->receipt=='')
    <div class="bg-blue-100 p-4 mt-8">
        <h5>Order Status</h5>
        <p>Receipt has not been uploaded</p>
    </div>
    @elseif($order->receipt_accepted=='')
    @php
    $url=asset('images/payment/receipt')."/". $order->receipt;
    @endphp
    <div class="flex flex-col justify-center items-center mt-8">
        <img src="{{$url}}" alt="img" id='preview_img' class="w-60 h-60">
        <div class="text-sm mt-4 space-x-2">
            <a href="{{ url('admin/orders/receipt/accept', $order) }}" class="btn-teal">Accept</a>
            <a href="{{ url('admin/orders/receipt/reject', $order) }}" class="btn-red rounded-none">Reject</a>
        </div>
    </div>
    @elseif($order->receipt_accepted)
    @if($order->shipped_at=='')
    <div class="text-sm bg-slate-100 p-4 mt-8 relative">
        <a href="{{ route('admin.orders.edit', $order) }}" class="absolute top-2 right-2">
            <i class="bx bx-pencil"></i>
        </a>
        <h5 class="">Shipping Address</h5>
        <div class="mt-2">{{ $order->customer_name }}, {{ $order->shipping_address }}</div>
        <div class="mt-4">
            <a href="{{ url('admin/orders/ship', $order) }}" class="btn-blue text-xs">
                Ship Now
            </a>
        </div>
    </div>
    @else
    <div class="text-sm bg-blue-100 p-4 mt-8">
        <h5>Order Status</h5>
        <div>Order has been shipped : {{ $order->shipped_at }}</div>
    </div>
    @endif

    @else
    <div class="text-sm bg-red-100 p-4 mt-8 ">
        <h5>Shipment Status</h5>
        <p>Receipt has been rejected!</p>
    </div>
    @endif

</div>
@endsection