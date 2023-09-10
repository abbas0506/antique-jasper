@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <h3>Cart Detail</h3>

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
            @php $total = 0; @endphp
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)

            @php
            $total += $details['price'] * $details['qty'];
            $url = asset('images/products') . "/" . $details['image'];
            @endphp

            <tr data-id='{{ $id }}'>
                <td>
                    <div class="flex justify-center">
                        <img src="{{$url}}" class="w-12">
                    </div>
                </td>
                <td>{{$details['code']}}</td>
                <td class="text-left">{{$details['name']}}</td>
                <td>{{$details['price']}}</td>
                <td>
                    <i class="bi-dash decQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                    <span class="quantity px-2">{{$details['qty']}}</span>
                    <i class="bi-plus incQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                </td>
                <td>{{$details['price'] * $details['qty']}}</td>
            </tr>
            @endforeach
            <!-- cart footer -->
            <tr class="border-t">
                <td colspan="4"></td>
                <td>Grand Total:</td>
                <td>Rs. {{ $total }} /-</td>
            </tr>

            @endif
        </tbody>
    </table>

    <div class="flex flex-wrap justify-center items-center md:space-x-4 mt-4">
        <a href="{{url('/')}}" class="btn-orange">Continue Shopping <span class="chevron-right pl-2"></span></a>
        <a href="{{url('cart/checkout')}}" class="btn-teal"> <i class="bi bi-check pr-2"></i>Check Out</a>
    </div>

</div>
@endsection
@section('script')
<script type="module">
    $('.incQty').click(function() {

        var ele = $(this);

        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                inc: 1,
                quantity: ele.parents("tr").find(".quantity").html()
            },
            success: function(response) {
                window.location.reload();
            }
        });

    });

    $('.decQty').click(function() {

        var ele = $(this);

        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                inc: -1,
                quantity: ele.parents("tr").find(".quantity").html()
            },
            success: function(response) {
                window.location.reload();
            }
        });

    });
</script>
@endsection