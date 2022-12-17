<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden z-50" id="navbarSm">
    <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">LOGO</a>
        <div class="flex">
            <div class="flex items-center mr-5">
                <button id="btnOpenFullScreen" onclick="openFullScreen()"><svg width="30" height="30" viewBox="0 0 24 24"><path fill="#fff" d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z" /></svg></button>
            </div>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>
    </div>


    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4 overflow-y-scroll">
        <a href="{{ route('account.landing') }}" class="flex items-center @yield('account') {{ request()->is('admin/account') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-user mr-3"></i>
            Akun Saya
        </a>
        @auth
            @if (Auth::user()->role = 'Admin')
                <a href="{{ route('dashboard') }}" class="flex items-center @yield('dashboard') {{ request()->is('admin/dashboard*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            @endif
        @endauth
        <a href="{{ route('home') }}" class="flex items-center @yield('home') {{ request()->is('admin/home') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-cogs mr-3"></i>
            Home
        </a>
        <form action="{{ route('logout') }}" class="flex w-full" method="post">
            @csrf
            @method('POST')
            <button type="submit" class="flex items-center w-full @yield('keluar') {{ request()->is('admin/keluar') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Keluar
            </button>
        </form>
    </nav>
    <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
        <i class="fas fa-plus mr-3"></i> New Report
    </button> -->
</header>
