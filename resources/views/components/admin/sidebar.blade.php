<aside aria-label="Sidebar" id='sidebar' class="sidebar">
    <div class="absolute top-2 right-2 hover:cursor-pointer md:hidden" onclick="toggleSidebar()"><i class="bi bi-x text-[32px]"></i></div>
    <div class="md:hidden flex justify-center pt-8 bg-red-50">
        <img src="{{asset('/images/logo.png')}}" alt="" class="w-24">
    </div>
    <div class="mt-12 px-5">
        <ul class="flex flex-col space-y-4">
            <li>
                <a href="{{url('/')}}">
                    <i class="bi bi-grid-1x2"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.categories.index')}}">
                    <i class="bi bi-gear"></i>
                    <span class="ml-3">Products</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-bag-check"></i>
                    <span class="ml-3">Orders</span>
                </a>
            </li>

            <li>
                <a href="#">
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