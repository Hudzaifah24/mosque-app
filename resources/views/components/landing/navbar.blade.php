<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex z-50">
    <div class="w-1/2">
        <a href="{{ route('home') }}">
            Logo
        </a>
    </div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img alt="profile" src="{{ asset('user_profile.png'); }}">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="{{ route('account.landing') }}" class="block px-4 py-2 account-link hover:text-white">Akun Saya</a>
            {{-- @if (Auth::user()->role->name == 'Admin')
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 account-link hover:text-white">Dashboard</a>
            @endif --}}
            <form action="{{ route('logout') }}" class="inline w-full" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="block px-4 py-2 account-link w-full text-left hover:text-white">Keluar</button>
            </form>
        </div>
    </div>
</header>
