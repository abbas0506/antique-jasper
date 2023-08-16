<header class="header">
    <div class="flex flex-wrap justify-between w-full">
        <div class="flex flex-wrap items-center">
            <!-- <div><span class="font-bold text-lg">ANTIQUE</span> <span class="text-xs">JASPER</span></div> -->
            <img src="{{asset('/images/logo.png')}}" alt="" width='60'>
            <nav class="hidden md:block ml-16">
                <ul class="flex flex-col md:flex-row flex-wrap space-x-0 md:space-x-6 text-slate-800">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{url('policy')}}">Policy</a>
                    </li>
                    <li>
                        <a href="{{url('about')}}">About</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex flex-wrap items-center space-x-4">
            <i class="bi bi-search hover:cursor-pointer" onclick="showSearchBar()"></i>
            <a href="{{route('cart.show')}}" class="relative">
                <i class="bi bi-cart2"></i>
                <span class="flex justify-center item text-xs absolute -top-2 -right-1 w-4 h-4 rounded-full bg-red-200">{{ count((array) session('cart')) }}</span>
            </a>

            <i class="bi bi-heart"></i>

            <div class='hover:cursor-pointer md:hidden' onclick="toggleSidebar()">
                <i class="bi bi-list text-[32px]"></i>
            </div>
        </div>
    </div>
</header>
<div id='searchBar' class="fixed z-30 top-40  hidden w-full">
    <form action="{{route('guest.products.search')}}" method="post">
        @csrf
        <div class="w-3/4 mx-auto relative">
            <input type="text" name='searchby' class="custom-input p-2 w-full" placeholder="I need ...">
            <i class="bi-search absolute top-4 right-4"></i>
        </div>
    </form>
</div>
<script>
    function showSearchBar() {
        $('#searchBar').slideToggle();
    }
</script>