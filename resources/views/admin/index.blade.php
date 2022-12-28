@extends('layouts.admin')
@section('page-content')
<section class="p-8">
    <h1 class="page-title">Dashboard</h1>
    <p class="bread-crumb">Login > dashboard</p>

    <div class="grid grid-cols-3 space-x-5 mt-8">
        <!-- pallette -->
        <a href="{{route('countries.index')}}" class="pallette">
            <div class="flex flex-1 flex-col ">
                <h1 class="">Pending Orders</h1>
                <p>125</p>
            </div>
            <div class="text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </a>
        <!-- pallette -->
        <a href='' class="pallette">
            <div class="flex flex-1 flex-col ">
                <h1>Shipped Orders</h1>
                <p>125</p>
            </div>
            <div class="text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

            </div>
        </a>
        <!-- pallette 2 -->
        <a href='' class="pallette">
            <div class="flex flex-1 flex-col">
                <h1>Recent Queries</h1>
                <p>125</p>
            </div>
            <div class="text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>

            </div>
        </a>
    </div>
</section>
<!-- recent orders -->
<section class="shadow-lg mx-8 p-5">
    <div class="py-3 border-b border-gray-200 text-green-800 font-bold">
        Current Orders
    </div>
    <table class="table-auto w-full mt-8">
        <thead>
            <tr class="border-b border-slate-200">
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @for($i=0; $i<18;$i++) <tr class="even:bg-slate-200">
                <td>Order ID</td>
                <td>Product Name</td>
                <td>Qty</td>
                <td>Unit Price</td>
                <td>Total</td>
                <td>Status</td>
                </tr>
                @endfor
        </tbody>
    </table>
</section>
@endsection