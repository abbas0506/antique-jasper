<aside aria-label="Sidebar" id='sidebar'>
    <div class="flex justify-center pt-8 bg-red-50">
        <img src="{{asset('/images/logo.png')}}" alt="" class="w-24">
    </div>
    <div class="mt-12 px-5">
        <ul class="flex flex-col space-y-2">
            <li>
                <a href="{{url('dashboard')}}">
                    <i class="bi bi-grid-1x2"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('categories')}}">
                    <i class="bi bi-tags"></i>
                    <span class="ml-3">Configuration</span>
                </a>
            </li>
            <li>
                <a href="{{url('users')}}">
                    <i class="bi bi-bag-check"></i>
                    <span class="ml-3">Orders</span>
                </a>
            </li>

            <li>
                <a href="{{url('semesters')}}">
                    <i class="bi bi-truck-flatbed"></i>
                    <span class="ml-3"> Shipments</span>
                </a>
            </li>

            <li class="my-4 border-b"></li>
            <li>
                <a href="{{route('users.changepw')}}">
                    <i class="bi bi-key -rotate-45"></i>
                    <span class="ml-3">Edit Password</span>
                </a>
            </li>
            <li>
                <a href="{{url('signout')}}">
                    <i class="bi bi-power"></i>
                    <span class="ml-3">Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>