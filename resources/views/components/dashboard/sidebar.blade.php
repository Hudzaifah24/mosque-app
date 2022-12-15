<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ Auth::user()->role->name }}</a>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            {{ Auth::user()->name }}
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('dashboard') }}" class="flex items-center @yield('dashboard') {{ request()->is('admin/dashboard') ? 'opacity-100' : 'opacity-75' }} hover:opacity-100 text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('kajian.index') }}" class="flex items-center @yield('kajian') text-white {{ request()->is('admin/kajian*') ? 'opacity-100' : 'opacity-75' }} hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Kajian
        </a>
        <a href="{{ route('cash.index') }}" class="flex items-center @yield('cash') text-white {{ request()->is('admin/cash*') ? 'opacity-100' : 'opacity-75' }} hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-tablet-alt mr-3"></i>
            Uang Kas
        </a>
        <a href="{{ route('jadwal.sholat') }}" class="flex items-center @yield('jadwalSholat') text-white {{ request()->is('jadwal/sholat*') ? 'opacity-100' : 'opacity-75' }} hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-calendar mr-3"></i>
            Jadwal Sholat
        </a>
        <a href="{{ route('user.index') }}" class="flex items-center @yield('user') text-white {{ request()->is('admin/user*') ? 'opacity-100' : 'opacity-75' }} hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Pengguna
        </a>
        <a href="{{ route('role.index') }}" class="flex items-center @yield('role') text-white {{ request()->is('admin/role*') ? 'opacity-100' : 'opacity-75' }} hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Role
        </a>
    </nav>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('POST')
        <button type="submit" class="absolute w-full upgrade-btn bottom-0 active-nav-link bg-blue-700 text-white flex items-center justify-center py-4">
            Keluar
        </button>
    </form>
</aside>
