<aside aria-label="Sidebar" id='sidebar' class="sidebar guest">
    <div class="absolute top-2 right-2 hover:cursor-pointer" onclick="toggleSidebar()"><i class="bi bi-x text-[32px]"></i></div>
    <div class="flex justify-center pt-8 bg-red-50">
        <img src="{{asset('/images/logo.png')}}" alt="" class="w-24">
    </div>
    <div class="mt-12 px-5">
        <ul class="flex flex-col items-center space-y-4">
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
    </div>
</aside>