@extends('layouts.admin')
@section('page-content')
<section class="m-8">
    <h1 class="page-title">Site Configuration</h1>
    <div class="bread-crumb">
        <a href="{{route('config.index')}}"> Config </a> >
        <a href="{{route('categories.index')}}">Categories </a> >
        {{$product->subcategory->category->name}} >
        <a href="{{route('subcategories.show',$product->subcategory)}}">Sub Category : {{$product->subcategory->name}} </a> >
        {{$product->name}}
    </div>
    <div class="container w-full md:w-4/5 mx-auto mt-16">
        @if ($errors->any())
        <div class="alert-danger mt-8">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="flex alert-success items-center mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>

            {{session('success')}}
        </div>
        @endif

        <div class="flex items-end justify-between space-x-8 pb-2 border-b">
            <div>
                <h1 class="font-bold leading-relaxed text-red-600">{{$product->name}}</h1>
                <p class="text-sm text-slate-600">Category: <span class="text-sm">[ {{$product->subcategory->category->name}} > {{$product->subcategory->name}} ] </span></p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{route('products.edit', $product)}}" class="text-sm text-center text-blue-400 hover:text-blue-600 hover:zoom"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
                <form action="{{route('products.destroy',$product)}}" method="POST" id='del_form{{$product->id}}' class="mt-1 flex justify-center hover:zoom">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center text-red-300 hover:text-red-800" onclick="delme('{{$product->id}}')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- product info -->
        <div class="flex w-full space-x-8 mt-8">
            <div class="flex flex-col flex-1">
                <label for="" class=''>Product Name</label>
                <div>{{$product->name}}</div>

                <label for="" class='mt-3'>Unit Price</label>
                <div>{{$product->unitprice}}</div>

                <label for="" class='mt-3'>Color</label>
                @if($product->color=='')
                <div>No Color</div>
                @else
                <input type="color" value="{{$product->color}}" disabled>
                @endif
            </div>
            <div class="flex justify-center items-center">
                @if($product->image=='')
                <img src="{{asset('images/no-image.png')}}" alt="" id='' class="w-60">
                @else
                @php
                $url=asset('images/products')."/".$product->image;
                @endphp
                <div class="img-magnifier-container" onmouseover="showMangifier()">
                    <img src="{{$url}}" alt="" id='product_img' class="w-60">
                </div>
                @endif
            </div>
        </div>
    </div>


    <div class="map-container-2 w-1/2 mx-auto mt-48">
        <iframe src="https://maps.google.com/maps?q=dipalpur&t=&z=13&ie=UTF8&iwloc=&output=embed" class="left-0 top-0 h-full w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" frameborder="0" allowfullscreen></iframe>
    </div>
</section>
@endsection
@section('script')

<script>
    magnify("product_img", 3);

    function magnify(imgID, zoom) {
        var img, glass, w, h, bw;
        img = document.getElementById(imgID);
        /*create magnifier glass:*/
        glass = document.createElement("DIV");
        glass.setAttribute("class", "img-magnifier-glass");
        /*insert magnifier glass:*/
        img.parentElement.insertBefore(glass, img);
        /*set background properties for the magnifier glass:*/
        glass.style.backgroundImage = "url('" + img.src + "')";
        glass.style.backgroundRepeat = "no-repeat";
        glass.style.backgroundSize =
            img.width * zoom + "px " + img.height * zoom + "px";
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 2;
        /*execute a function when someone moves the magnifier glass over the image:*/
        glass.addEventListener("mousemove", moveMagnifier);
        img.addEventListener("mousemove", moveMagnifier);
        /*and also for touch screens:*/
        glass.addEventListener("touchmove", moveMagnifier);
        img.addEventListener("touchmove", moveMagnifier);

        function moveMagnifier(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /*prevent the magnifier glass from being positioned outside the image:*/
            if (x > img.width - w / zoom) {
                x = img.width - w / zoom;
            }
            if (x < w / zoom) {
                x = w / zoom;
            }
            if (y > img.height - h / zoom) {
                y = img.height - h / zoom;
            }
            if (y < h / zoom) {
                y = h / zoom;
            }
            /*set the position of the magnifier glass:*/
            glass.style.left = x - w + "px";
            glass.style.top = y - h + "px";
            /*display what the magnifier glass "sees":*/
            glass.style.backgroundPosition =
                "-" + (x * zoom - w + bw) + "px -" + (y * zoom - h + bw) + "px";
        }

        function getCursorPos(e) {
            var a,
                x = 0,
                y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {
                x: x,
                y: y
            };
        }
    }
</script>

@endsection