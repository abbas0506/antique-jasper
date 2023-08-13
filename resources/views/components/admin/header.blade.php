<header class="header admin">
    <div class="flex flex-wrap h-16 items-center justify-between w-full">
        <img src="{{asset('/images/logo.png')}}" alt="" class="w-16">
        <div class="flex items-center space-x-3 flex-wrap">
            <a href='' class="relative">
                <i class="bi bi-bell"></i>
                <div class="absolute flex justify-center items-center h-3 w-3 top-0 right-0 rounded-full">
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-400"></span>
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                </div>
            </a>
            <div class="flex justify-center items-center w-8 h-8 rounded-full ring-1 ring-sky-500 ring-offset-2">
                <!-- <img src="{{asset('/images/all-img/team/team-2.png')}}" alt="" class="w-6"> -->
                <i class="bi-person"></i>
            </div>
            <div class='md:hidden hover:cursor-pointer' onclick="toggleSidebar()">
                <i class="bi bi-list text-[32px]"></i>
            </div>

        </div>
    </div>

</header>