@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h4>Edit Sub-Category</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.show', $product->subcategory->category)}}">{{$product->subcategory->category->name}}</a>
        <div>/</div>
        <a href="{{route('admin.subcategories.show', $product->subcategory)}}">{{$product->subcategory->name}}</a>
        <div>/</div>
        <div>{{$product->name}}</div>
        <div>/</div>
        <div>Edit</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <!-- product info -->
    <div class="grid grid-cols-1 md:grid-cols-2 items-center flex-1 mt-8">
        <div class="flex flex-col">
            <label for="" class=''>Product Name</label>
            <div>{{$product->name}}</div>

            <label for="" class='mt-3'>Product Code</label>
            <div>{{$product->code}}</div>

            <label for="" class='mt-3'>Unit Price</label>
            <div>{{$product->price}}</div>

            <label for="" class='mt-3'>Color</label>
            @if($product->color==1)
            <div class="w-6 h-6 bg-black"></div>
            @elseif($product->color==2)
            <div class="w-6 h-6 bg-blue-700"></div>
            @elseif($product->color==3)
            <div class="w-6 h-6 bg-gray-400"></div>
            @elseif($product->color==4)
            <div class="w-6 h-6 border border-slate-800 bg-white"></div>
            @elseif($product->color==5)
            <div class="w-6 h-6 bg-green-700"></div>
            @elseif($product->color==6)
            <div class="w-6 h-6 bg-red-700"></div>
            @elseif($product->color==7)
            <div class="w-6 h-6 bg-orange-300"></div>
            @else
            <div>NA</div>
            @endif

            <label for="" class='mt-3'>Specific to (gender)</label>
            @if($product->gender=='')
            <div>NA</div>
            @else
            <div>{{$product->gender}}</div>
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