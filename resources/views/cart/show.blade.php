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
                <td><img src="{{$url}}" class="w-12"></td>
                <td>{{$details['code']}}</td>
                <td class="text-left">{{$details['name']}}</td>
                <td>{{$details['price']}}</td>
                <td>
                    <i class="bi-dash decQty"></i>
                    <span class="quantity">{{$details['qty']}}</span>
                    <i class="bi-plus incQty"></i>
                </td>
                <td>{{$details['price'] * $details['qty']}}</td>
            </tr>
            @endforeach
            <!-- cart footer -->
            <tr class="border-t">
                <td colspan="4"></td>
                <td>Total:</td>
                <td>Rs. {{ $total }}</td>
            </tr>

            @endif
        </tbody>
    </table>

    <div class="flex flex-wrap justify-center items-center md:space-x-4 mt-4">
        <a href="{{url('/')}}" class="btn-orange">Continue Shopping <span class="chevron-right pl-2"></span></a>
        <a href="{{url('/')}}" class="btn-teal"> <i class="bi bi-check pr-2"></i>Check Out</a>
    </div>

</div>
@endsection
<script type="module">
    $('.incQty').click(function() {

        var ele = $(this);

        $.ajax({
            url: "{{ route('update.cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").html()
            },
            success: function(response) {
                window.location.reload();
            }
        });

    });
</script>