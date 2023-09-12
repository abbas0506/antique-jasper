@extends('layouts.admin')
@section('page-content')
<div class="container pt-16 bg-slate-100">
    <h3>Dashboard</h3>
    <div class="bread-crumb">
        <div>Login</div>
        <div>/</div>
        <div>dashboard</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        <!-- pallette -->
        <a href="#" class="pallette text-orange-400 bg-orange-50 hover:bg-orange-100">
            <div class="flex justify-center items-center w-16">
                <i class="bi bi-clock text-xl"></i>
            </div>
            <div class="flex flex-col">
                <h3>Pending Orders</h3>
                <p>125</p>
            </div>

        </a>
        <!-- pallette -->
        <a href='' class="pallette text-teal-600 bg-teal-50 hover:bg-teal-100">
            <div class="flex justify-center items-center w-16">
                <i class="bi bi-check2-all"></i>
            </div>
            <div class="flex flex-col">
                <h3>Shipped Orders</h3>
                <p>125</p>
            </div>

        </a>
        <!-- pallette 2 -->
        <a href='' class="pallette text-blue-400 bg-blue-50 hover:bg-blue-100 ">
            <div class="flex justify-center items-center w-16">
                <i class="bi bi-chat-square"></i>
            </div>
            <div class="flex flex-1 flex-col">
                <h3>Recent Queries</h3>
                <p>125</p>
            </div>

        </a>
    </div>
    <div class="col-span-2 bg-white p-4 mt-4">
        <div class="py-3 border-b border-gray-200 text-green-800 font-bold">
            Current Orders
        </div>
        <table class="table-auto w-full mt-8">
            <thead>
                <tr class="border-b border-slate-200">
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Receipt</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders->whereNull('shipped_at') as $order) <tr class="tr border-b">
                    <td>{{$order->tracking_id}}</td>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->order_details->count() }}</td>
                    <td> {{ $order->amount() }}</td>
                    <td>
                        <div class="flex justify-center">
                            @if($order->image=='')
                            <img src="{{asset('images/no-image.png')}}" alt="" id='preview_img' class="w-8 h-8">
                            @else
                            @php
                            $url=asset('images/payment/receipt')."/". $order->image;
                            @endphp
                            <img src="{{$url}}" alt="img" id='preview_img' class="w-12 h-12 rounded-md">
                            @endif
                        </div>
                    </td>
                    <td>{{ $order->status() }}</td>
                    <td>
                        <a href="{{route('admin.orders.show',$order)}}">
                            <i class="bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection