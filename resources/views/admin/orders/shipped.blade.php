@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h3>Shipped Orders</h3>
    <div class="bread-crumb">
        <a href="{{url('/')}}">Home</a>
        <div>/</div>
        <div>Shipped</div>
    </div>

    <!-- search -->
    <div class="flex relative w-full md:w-1/3 mt-12">
        <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
        <i class="bi-search absolute top-2 right-2"></i>
    </div>

    <div class="bg-white p-4 mt-4 overflow-x-auto">
        <table class="table-fixed w-full">
            <thead>
                <tr class="">
                    <th class="w-16">Order ID</th>
                    <th class="w-48 text-left">Customer</th>
                    <th class="w-12">Products</th>
                    <th class="w-16">Price</th>
                    <th class="w-24">Ship Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders->sortByDesc('updated_at') as $order) <tr class="tr">
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="link">{{$order->tracking_id}}</a>
                    </td>
                    <td class="text-left">{{ $order->customer_name }}</td>
                    <td>{{ $order->order_details->count() }}</td>
                    <td> {{ $order->amount() }}</td>
                    <td> {{ $order->shipped_at }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
@section('script')
<script type="text/javascript">
    function search(event) {
        var searchtext = event.target.value.toLowerCase();
        var str = 0;
        $('.tr').each(function() {
            if (!(
                    $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection