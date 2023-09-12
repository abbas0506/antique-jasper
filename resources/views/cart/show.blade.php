@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <h3>Cart Detail</h3>
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
                        <div class="flex flex-nowrap justify-center items-center">
                            <i class="bi-dash decQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                            <span class="quantity px-2">{{$details['qty']}}</span>
                            <i class="bi-plus incQty px-1 bg-slate-200 hover:cursor-pointer"></i>
                        </div>
                    </td>
                    <td>{{$details['price'] * $details['qty']}}</td>
                </tr>
                @endforeach
                <!-- cart footer -->
                <tr class="border-t font-semibold">
                    <td colspan="5" class="text-right">Grand Total:</td>
                    <td>Rs. {{ $total }} /-</td>
                </tr>

                @endif
            </tbody>
        </table>
    </div>
    <div class="flex flex-wrap justify-center items-center gap-2 mt-8">
        <a href="{{url('/')}}" class="btn-orange rounded-none w-48 text-center">Continue Shopping <span class="chevron-right pl-2"></span></a>
        <a href="{{url('cart/checkout')}}" class="btn-teal w-48 text-center"> <i class="bi bi-check pr-2"></i>Check Out</a>
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