<header class="header">
    <div class="container">
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
            <div class="flex flex-wrap items-center space-x-2">
                <i class="bi bi-search"></i>
                <i class="bi bi-cart2"></i>
                <i class="bi bi-heart"></i>
                <i class="bi bi-list md:hidden"></i>
            </div>
        </div>


    </div>

</header>