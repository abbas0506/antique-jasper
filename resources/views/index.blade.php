@extends('layouts.basic')
@section('page')
<header class="header">
    <div class="flex flex-wrap justify-between items-center h-full w-max-full px-4">
        <div>AJ</div>
        <i class="bi bi-list md:hidden"></i>
        <nav class="hidden md:block">
            <ul class="flex flex-col md:flex-row flex-wrap space-x-0 md:space-x-4">
                <li>About</li>
                <li>Men</li>
                <li>Wear</li>
                <li>About</li>
            </ul>
        </nav>
    </div>
</header>
<!-- slider -->

<section id='hero-section' class="h-screen max-w-screen bg-orange-200">
    <div class="flex justify-between items-center h-6 px-4 md:px-8 bg-white text-sm flex-wrap">
        <div>
            <marquee behavior="" direction="">10% off on all products</marquee>
        </div>

        <div class="flex justify-items-center">
            <a href=""><i class="bi bi-facebook text-blue-600"></i></a>
        </div>
    </div>
</section>
<section id='brand-section' class="my-16">
    <div class="grid grid-cols-1 md:grid-cols-3 w-full gap-x-0 md:gap-x-8 md:px-24">
        <!-- item  -->
        <div class="p-4 relative border">
            <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                    <i class="bi bi-cart2"></i>
                </a>
            </div>
            <div class="absoulte top-6 left-6">
                <h4>Men</h4>
            </div>
            <img src="{{asset('images/no-image.png')}}" alt="" width="200px">
            <div class="absolute bottom-0 left-0 w-full px-4">
                <div class="flex flex-wrap w-full justify-between">
                    <div>Price</div>
                    <div><i class="bi bi-cart2"></i></div>
                </div>
            </div>
        </div>
        <div class="p-4 relative border">
            <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                    <i class="bi bi-cart2"></i>
                </a>
            </div>
            <div class="absoulte top-6 left-6">
                <h4>Men</h4>
            </div>
            <img src="{{asset('images/no-image.png')}}" alt="" width="200px" height="200px">
            <div class="absolute bottom-0 left-0 w-full px-4">
                <div class="flex flex-wrap w-full justify-between">
                    <div>Price</div>
                    <div><i class="bi bi-cart2"></i></div>
                </div>
            </div>
        </div>
        <div class="p-4 relative border">
            <div class="absolute left-0 top-0  flex justify-center items-center w-full h-full opacity-0 hover:opacity-80 bg-gray-400 z-20">
                <a href="" class="flex justify-center items-center w-16 h-16 rounded-full bg-white border-red-400">
                    <i class="bi bi-cart2"></i>
                </a>
            </div>
            <div class="absoulte top-6 left-6">
                <h4>Men</h4>
            </div>
            <img src="{{asset('images/no-image.png')}}" alt="" width="200px" height="200px">
            <div class="absolute bottom-0 left-0 w-full px-4">
                <div class="flex flex-wrap w-full justify-between">
                    <div>Price</div>
                    <div><i class="bi bi-cart2"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- products overview -->
<section id='product-overview' class="my-16 md:px-24">
    <h1 class="text-4xl font-bold">PRODUCT OVERVIEW</h1>
    <!-- product navbar -->
    <div class="flex flex-wrap w-full justify-between mt-8">
        <nav id='product-nav'>
            <ul>
                <li class="active">All Products</li>
                <li>Men</li>
                <li>Women</li>
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