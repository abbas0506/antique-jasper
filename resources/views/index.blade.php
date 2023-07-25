@extends('layouts.basic')
@section('page')
<header class="header">
    <div class="flex flex-wrap justify-between items-center h-full w-max-full px-4 md:px-16">
        <div class="flex items-center">
            <!-- <div><span class="font-bold text-lg">ANTIQUE</span> <span class="text-xs">JASPER</span></div> -->
            <img src="{{asset('/images/logo.png')}}" alt="" width='60'>
            <nav class="hidden md:block ml-16">
                <ul class="flex flex-col md:flex-row flex-wrap space-x-0 md:space-x-4 text-slate-800">
                    <li>Home</li>
                    <li>Policy</li>
                    <li>Blog</li>
                    <li>About</li>
                    <li>Contact</li>
                </ul>
            </nav>
        </div>
        <div class="flex flex-wrap space-x-2">
            <i class="bi bi-search"></i>
            <i class="bi bi-cart2"></i>
            <i class="bi bi-heart"></i>
            <i class="bi bi-list md:hidden"></i>
        </div>

    </div>

</header>
<!-- slider -->

<section id='hero-section' class="h-screen max-w-screen bg-orange-200 bg-cover bg-no-repeat" style="background-image: url('/images/necklace.png');">
    <div class="flex justify-between items-center px-4 md:px-16 bg-slate-800 text-white text-xs flex-wrap ">
        <div>
            <marquee behavior="" direction="">10% off to all customers on all products till 14 august. Free Delivery all over Pakistan</marquee>
        </div>

        <div class="flex flex-wrap items-center space-x-2">
            <a href="">
                <i class="bi bi-phone"></i>
                +92 304 4933477
            </a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>

        </div>
    </div>
</section>
<section id='brand-section' class="mt-24">
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-3xl text-slate-800">Our Featured Collection</h1>
        <p class="mt-4">We have top featured collection of gold rings, stone, artificial jewellery both for men and women. </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 w-full gap-x-0 md:gap-x-8 px-4 md:px-16 mt-16">
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
</section>
<!-- products overview -->
<section id='product-overview' class="my-16 px-4 md:px-16">
    <h1 class="text-4xl font-bold">PRODUCT OVERVIEW</h1>
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

</section>
<footer>
    <div class="flex flex-col flex-wrap justify-center bg-black text-slate-200 py-4">
        <div class="text-center text-md">Customer Care</div>

        <nav class="flex justify-center items-center space">
            <ul class="flex flex-wrap space-x-4 mt-4 text-xs">
                <li>Delivery</li>
                <li>Return</li>
                <li>FAQ</li>
                <li>About</li>
                <li>Contact</li>
            </ul>
        </nav>
        <div class="flex justify-center items-center mt-2">
            <a href=""><i class="bi bi-facebook text-blue-600"></i></a>
            <a href=""><i class="bi bi-twitter text-sky-600 ml-2"></i></a>
            <a href=""><i class="bi bi-instagram text-slate-300 ml-2"></i></a>
        </div>
    </div>
    <!-- floating whatsapp icon -->
    <div class="fixed bottom-6 right-6">
        <div class="flex justify-center items-end">
            <div class="text-sm">Need Help?</div>
            <div>
                <i class="bi bi-whatsapp text-green-600 text-3xl ml-2"></i>
            </div>
        </div>
    </div>
</footer>
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