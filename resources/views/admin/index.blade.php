@extends('layouts.admin')
@section('page-content')
<section class="p-8">
    <h1 class="page-title">Dashboard</h1>
    <p class="bread-crumb">Login > dashboard</p>

    <div class="grid grid-cols-3 gap-8 mt-8">
        <!-- pallette -->
        <a href="{{route('countries.index')}}" class="pallette bg-orange-100 hover:bg-orange-200">
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
        <a href='' class="pallette bg-teal-100 hover:bg-teal-200">
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
        <a href='' class="pallette bg-blue-100 hover:bg-blue-200 ">
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
        <div class="col-span-2 shadow-lg p-5">
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
                    @for($i=0; $i<18;$i++) <tr class="tr border-b">
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
        </div>
        <div class="">
            <div class="flex flex-col shadow-lg">
                <a href="{{route('config.index')}}" class="flex items-center border-b border-slate-300 hover:bg-slate-200  text-blue-400 hover:text-blue-600 px-5 py-2">
                    <h1 class="flex flex-1"> Site Configuration </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
                <div class="p-4 text-sm text-slate-600">
                    <div class="flex justify-between items-center mt-2">
                        <div>Countries</div>
                        <div>{{$countries_count}}</div>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <div>Product Categories</div>
                        <div>{{$categories_count}}</div>
                    </div>
                    <div class="flex justify-between items-center text-sm mt-2">
                        <div>Products</div>
                        <div>{{$products_count}}</div>
                    </div>
                </div>

            </div>

            <!-- change password -->
            <a href="{{route('users.changepw')}}" class="flex justify-between items-center text-slate-600 text-sm hover:bg-slate-200 shadow-lg p-4 mt-8">
                <div>Change Password</div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                </svg>
            </a>

        </div>
    </div>
</section>
<!-- recent orders -->
<section class="shadow-lg mx-8 p-5">

</section>
@endsection