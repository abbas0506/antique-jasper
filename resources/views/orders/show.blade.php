@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <h3 class="mt-4 text-center tracking-widest">Order # {{ $order->tracking_id }}</h3>
    <div class="border-y flex flex-col justify-center items-center p-4 mt-4">
        @php

        $total=0;
        if(session('cart')){
        foreach(session('cart') as $id => $details)
        $total += $details['price'] * $details['qty'];
        }
        @endphp

        <label>Total Amount</label>
        <h4>Rs. {{ $order->amount() }}</h4>
        <div class="text-xs mt-2">*Amount is recieved through JazzCash</div>

    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Image</th>
                <th>Code</th>
                <th class="text-left">Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $orderDetail)
            @php
            $url = asset('images/products') . "/" . $orderDetail->product->image;
            @endphp

            <tr data-id="{{ $orderDetail->id }}">
                <td>
                    <div class="flex justify-center">
                        <img src="{{$url}}" class="w-12">
                    </div>
                </td>
                <td>{{$orderDetail->product->code}}</td>
                <td class="text-left">{{$orderDetail->product->name}}</td>
                <td>{{$orderDetail->product->price}}</td>
                <td>
                    <i class="bi-dash decQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                    <span class="quantity px-2">{{$orderDetail->qty}}</span>
                    <i class="bi-plus incQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                </td>
                <td>{{$orderDetail->qty*$orderDetail->product->price}}</td>
            </tr>
            @endforeach
            <!-- cart footer -->
            <tr class="border-t font-semibold">
                <td colspan="4"></td>
                <td>Grand Total:</td>
                <td>Rs. {{ $order->amount() }} /-</td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
@section('script')
<script type="module">
    $('.incQty').click(function() {

        var ele = $(this);

        $.ajax({
            url: "{{ url('order/details/update') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                inc: 1,
                qty: ele.parents("tr").find(".quantity").html()
            },
            success: function(response) {
                window.location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'warning',
                    title: errorThrown
                });
            }
        });

    });

    $('.decQty').click(function() {

        var ele = $(this);

        $.ajax({
            url: "{{ url('order/details/update') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                inc: -1,
                qty: ele.parents("tr").find(".quantity").html()
            },
            success: function(response) {
                alert(response.msg)
                window.location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'warning',
                    title: errorThrown
                });
            }
        });

    });
</script>
@endsection