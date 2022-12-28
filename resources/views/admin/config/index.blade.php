@extends('layouts.admin')
@section('page-content')
<section class="p-8">
    <h1 class="page-title">Site Configuration</h1>
    <p class="bread-crumb">Login > config</p>

    <div class="grid grid-cols-3 space-x-5 mt-12">
        <!-- pallette -->
        <a href="{{route('countries.index')}}" class="pallette bg-orange-100 hover:bg-orange-200">
            <div class="flex flex-1 flex-col ">
                <h1 class="">Countries</h1>
                <p>{{$countries->count()}}</p>
            </div>
            <div class="text-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                </svg>
            </div>
        </a>
        <!-- pallette -->
        <a href="{{route('categories.index')}}" class="pallette bg-teal-100 hover:bg-teal-200">
            <div class="flex flex-1 flex-col ">
                <h1>Categories</h1>
                <p>{{$categories->count()}}</p>
            </div>
            <div class="text-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>

            </div>
        </a>
        <!-- pallette 2 -->
        <a href='' class="pallette bg-blue-100 hover:bg-blue-200">
            <div class="flex flex-1 flex-col">
                <h1>Products</h1>
                <p>{{$products->count()}}</p>
            </div>
            <div class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
            </div>
        </a>
        <ul class="list-disc pt-5 pl-4 text-sm">
            @foreach($countries as $country)
            <li>{{$country->name}}</li>
            @endforeach
        </ul>

        <ul class="p-5 text-sm">
            @foreach($categories as $category)
            <li class="font-bold">{{$category->name}}</li>
            @if($category->subcategories->count()>0)
            <ul>
                @foreach($category->subcategories as $subcategory)
                <li>{{$subcategory->name}}</li>
                @endforeach
            </ul>
            @else
            <ul class="list-disc pl-8">
                <li>No subcategory</li>
            </ul>
            @endif
            @endforeach
        </ul>
        <ul class="list-disc pt-5 pl-4 text-sm">
            @foreach($products as $product)
            <li>{{$product->name}}</li>
            @endforeach
        </ul>
    </div>
</section>

@endsection