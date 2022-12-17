<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex z-50" id="navbarLg">
    <button id="btnOpenFullScreen2" onclick="openFullScreen();"><svg width="30" height="30" viewBox="0 0 24 24"><path fill="#000" d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z" /></svg></button>
    <div class="mx-auto w-full text-center">
        <a href="{{ route('home') }}">
            Logo
        </a>
    </div>
    <div x-data="{ isOpen: false }" class="relative flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img alt="profile" src="{{ asset('user_profile.png'); }}">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="{{ route('account.landing') }}" class="block px-4 py-2 account-link hover:text-white">Akun Saya</a>
            @auth
                @if (Auth::user()->role->name == 'Admin')
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 account-link hover:text-white">Dashboard</a>
                @endif
            @endauth
            <a href="{{ route('home') }}" class="block px-4 py-2 account-link hover:text-white">Home</a>
            <form action="{{ route('logout') }}" class="inline w-full" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="block px-4 py-2 account-link w-full text-left hover:text-white">Keluar</button>
            </form>
        </div>
    </div>
</header>
