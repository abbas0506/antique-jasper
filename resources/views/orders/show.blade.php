@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <h3 class="mt-4 text-center tracking-widest">Order # {{ $order->tracking_id }}</h3>
    <div class="text-sm text-center">{{ $order->created_at }}</div>
    <div class="border-y flex flex-col justify-center items-center p-4 mt-4">
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
    <div class="flex justify-center items-center space-x-2 font-semibold mt-4">
        <h4 class="text-sm">Status:</h4>
        <div class="bg-green-200 px-3 rounded-full text-sm">{{$order->status()}}</div>
    </div>
    <div class="w-full overflow-x-auto mt-4">
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="w-16">Image</th>
                    <th class="w-16">Code</th>
                    <th class="text-left w-48">Product</th>
                    <th class="w-12">Price</th>
                    <th class="w-16">Qty</th>
                    <th class="w-20">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->order_details as $order_detail)
                @php
                $url = asset('images/products') . "/" . $order_detail->product->image;
                @endphp

                <tr data-id="{{ $order_detail->id }}">
                    <td>
                        <div class="flex justify-center">
                            <img src="{{$url}}" class="w-12">
                        </div>
                    </td>
                    <td>{{$order_detail->product->code}}</td>
                    <td class="text-left">{{$order_detail->product->name}}</td>
                    <td>{{$order_detail->product->price}}</td>
                    <td>
                        <div class="flex flex-nowrap justify-center items-center">
                            <i class="bi-dash decQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                            <span class="quantity px-2">{{$order_detail->qty}}</span>
                            <i class="bi-plus incQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                        </div>
                    </td>
                    <td>{{ $order_detail->qty*$order_detail->product->price }}</td>
                </tr>
                @endforeach
                <!-- cart footer -->
                <tr class="border-t font-semibold">
                    <td colspan="5" class="text-right">Grand Total:</td>
                    <td>Rs. {{ $order->amount() }} /-</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-6">
        <a href="{{route('orders.payment',$order)}}" class="btn-teal tracking-wider">PAY NOW</a>
    </div>
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