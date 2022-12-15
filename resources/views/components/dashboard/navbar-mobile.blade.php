<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ Auth::user()->role->name }}</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="{{ route('dashboard') }}" class="flex items-center @yield('dashboard') {{ request()->is('admin/dashboard*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('kajian.index') }}" class="flex items-center @yield('kajian') {{ request()->is('admin/kajian*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Kajian
        </a>
        <a href="{{ route('cash.index') }}" class="flex items-center @yield('cash') {{ request()->is('admin/cash*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-table mr-3"></i>
            Uang Kas
        </a>
        <a href="{{ route('jadwal.sholat') }}" class="flex items-center @yield('jadwalSholat') {{ request()->is('admin/jadwal/sholat*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Jadwal Sholat
        </a>
        <a href="{{ route('user.index') }}" class="flex items-center @yield('user') {{ request()->is('admin/user*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-tablet-alt mr-3"></i>
            Pengguna
        </a>
        <a href="{{ route('role.index') }}" class="flex items-center @yield('role') {{ request()->is('admin/role*') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-calendar mr-3"></i>
            Role
        </a>
        <a href="{{ route('account') }}" class="flex items-center @yield('account') {{ request()->is('admin/account') ? 'opacity-100' : 'opacity-75' }} text-white hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-user mr-3"></i>
            Akun Saya
        </a>
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
