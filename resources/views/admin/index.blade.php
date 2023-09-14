@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h3>Home</h3>
    <div class="bread-crumb">
        <div>Admin</div>
        <div>/</div>
        <div>Home</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        <!-- pallette -->
        <a href="{{ url('admin/pending') }}" class="pallette text-orange-400 bg-orange-50 hover:bg-orange-100">
            <div class="flex justify-center items-center w-16">
                <i class="bi bi-clock text-xl"></i>
            </div>
            <div class="flex flex-col">
                <h3>All Orders</h3>
                <p>{{$orders->count()}}</p>
            </div>

        </a>
        <!-- pallette -->
        <a href="{{ url('admin/shipped') }}" class=" pallette text-teal-600 bg-teal-50 hover:bg-teal-100">
            <div class="flex justify-center items-center w-16">
                <i class="bi bi-check2-all"></i>
            </div>
            <div class="flex flex-col">
                <h3>Shipped Orders</h3>
                <p>{{$orders->whereNotNull('shipped_at')->count()}}</p>
            </div>

        </a>
        <!-- pallette 2 -->
        <a href="{{ url('admin/rejected') }}" class="pallette text-blue-400 bg-blue-50 hover:bg-blue-100 ">
            <div class="flex justify-center items-center w-16">
                <i class="bi bi-chat-square"></i>
            </div>
            <div class="flex flex-1 flex-col">
                <h3>Rejected Orders</h3>
                <p>{{$orders->where('receipt_accepted', 0)->count()}}</p>
            </div>

        </a>
    </div>
    <div class="bg-white p-4 mt-4 overflow-x-auto">
        <div class="py-3 border-b border-gray-200 text-green-800 font-bold">
            Pending Orders
        </div>
        <table class="table-fixed w-full">
            <thead>
                <tr class="">
                    <th class="w-16">Order ID</th>
                    <th class="w-48 text-left">Customer</th>
                    <th class="w-12">Products</th>
                    <th class="w-16">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders->whereNull('shipped_at')->sortByDesc('updated_at') as $order)
                <tr class="tr">
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="link">{{$order->tracking_id}}</a>
                    </td>
                    <td class="text-left">{{ $order->customer_name }}</td>
                    <td>{{ $order->order_details->count() }}</td>
                    <td> {{ $order->amount() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection