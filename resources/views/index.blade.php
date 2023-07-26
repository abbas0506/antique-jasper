@extends('layouts.guest')

@section('body')
<!-- hero section -->
<section class="h-screen bg-orange-50 bg-cover bg-no-repeat">
    <div class="container bg-slate-800 text-sm text-white">
        <div class="grid grid-cols-1 md:grid-cols-2 justify-center">
            <div class="">
                <marquee behavior="" direction="">100% free delivery all over Pakistan</marquee>
            </div>

            <div class="flex items-center justify-center md:justify-end space-x-2 w-full">
                <a href="https://wa.me/+923044933477" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                    +92 304 4933477
                </a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>

            </div>
        </div>
    </div>
    <div class="container h-full">
        <div class="grid grid-cols-1 md:grid-cols-2 h-full items-center">
            <div>
                <h1>ANTIQUE JASPER</h1>
                <p class="text-xl mt-6">We have a unique collection of 1000+ items for you with reasonable price. We believe in our prolonged customer relations. Feel free to place your order; shipment is free all over Pakistan.</p>
            </div>
            <div class="text-center">
                image
            </div>
        </div>
        <!-- <div class="flex flex-wrap-reverse items-center justify-between h-full">

        </div> -->
    </div>

</section>

<!-- featured items section -->
<section class="mt-24">
    <div class="container">
        <div class="flex flex-col justify-center items-center">
            <h2>Our Featured Collection</h1>
                <p class="text-xl mt-4 text-center">We have top featured collection of gold rings, stone, artificial jewellery both for men and women. </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 w-full mt-24">
            <!-- item  -->
            <div class="relative border">
                <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                    <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                        <i class="bi bi-cart2"></i>
                    </a>
                </div>
                <div class="absolute top-6 left-6">
                    <h2 class="text-2xl font-bold">Women</h2>
                    <h3 class="text-md text-slate-600">Spring 2023</h3>
                </div>
                <img src="{{asset('images/woman.png')}}" alt="">
            </div>
            <div class="relative border">
                <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                    <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                        <i class="bi bi-cart2"></i>
                    </a>
                </div>
                <div class="absolute top-6 left-6">
                    <h2 class="text-2xl font-bold">Men</h2>
                    <h3 class="text-md text-slate-600">Spring 2023</h3>
                </div>
                <img src="{{asset('images/man.png')}}" alt="">
            </div>
            <div class="relative border">
                <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                    <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                        <i class="bi bi-cart2"></i>
                    </a>
                </div>
                <div class="absolute top-6 left-6">
                    <h2 class="text-2xl font-bold">Customized</h2>
                    <h3 class="text-md text-slate-600">Spring 2023</h3>
                </div>
                <img src="{{asset('images/man.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Overview section -->
<section class="my-24">
    <div class="container">
        <h1 class="text-4xl font-bold">Product Overview</h1>
        <!-- product navbar -->
        <div class="flex flex-wrap w-full justify-between mt-8">
            <nav id='product-nav'>
                <ul>
                    <li class="active">All Products</li>
                    <li>Women</li>
                    <li>Men</li>
                    <li>Jewellery</li>
                    <li>Stone</li>
                    <li>Custom Articles</li>
                </ul>
            </nav>
            <div class="flex flex-wrap space-x-4">
                <div class="flex justify-center items-center px-4 py-2 border rounded-sm hover:bg-indigo-500 hover:text-white">
                    <i class="bi bi-filter mr-2"></i>
                    <p>Filter</p>
                </div>
                <div class="flex justify-center items-center px-4 py-2 border rounded-sm hover:bg-indigo-500 hover:text-white">
                    <i class="bi bi-search mr-2"></i>
                    <p>Search</p>
                </div>
            </div>
        </div>
        <!-- product listing -->
        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-4 md:gap-x-6">
                <div class="product-card">
                    <div class="product">
                        <img src="{{asset('images/products/1.png')}}" alt="">
                        <div class="preview-btn">
                            <button>Quick View</button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <div>
                            <a href="">Product Name </a>
                            <p>Rs. 25</p>
                        </div>
                        <div>
                            <i class="bi bi-cart2"></i>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product">
                        <img src="{{asset('images/products/1.png')}}" alt="">
                        <div class="preview-btn">
                            <button>Quick View</button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <div>
                            <a href="">Product Name </a>
                            <p>Rs. 25</p>
                        </div>
                        <div>
                            <i class="bi bi-cart2"></i>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product">
                        <img src="{{asset('images/products/1.png')}}" alt="">
                        <div class="preview-btn">
                            <button>Quick View</button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <div>
                            <a href="">Product Name </a>
                            <p>Rs. 25</p>
                        </div>
                        <div>
                            <i class="bi bi-cart2"></i>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product">
                        <img src="{{asset('images/products/1.png')}}" alt="">
                        <div class="preview-btn">
                            <button>Quick View</button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <div>
                            <a href="">Product Name </a>
                            <p>Rs. 25</p>
                        </div>
                        <div>
                            <i class="bi bi-cart2"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="flex justify-center items-center mt-16 ">
            <button class="flex justify-center items-center rounded-full px-6 py-2 border-[1px] hover:bg-black hover:text-slate-300">Load More</button>
        </div>
    </div>
</section>

@endsection

@section('script')
<script type="module">
    $(window).scroll(function() { // this will work when your window scrolled.
        var height = $(window).scrollTop(); //getting the scrolling height of window
        if (height > 10) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
    });
</script>
@endsection