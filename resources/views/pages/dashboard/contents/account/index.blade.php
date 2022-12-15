@extends('pages.dashboard.index')

@section('account', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Akun</h1>

        <div class="w-full">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-user mr-3"></i> Akun Pribadi
            </p>

            <div class="leading-loose">
                <form action="{{ route('account.update', $user->id) }}" method="POST" class="p-10 bg-white rounded shadow-xl">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nama Anda" aria-label="Name" value="{{ $user->name }}">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Email Anda" aria-label="Email" value="{{ $user->email }}">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="role">Role</label>
                        <input disabled class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="role" name="role" type="text" required="" placeholder="Nama Anda" aria-label="role" value="{{ $user->role->name }}">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="status">Status</label>
                        <div class="flex gap-10">
                            @if($user->status == 'active')
                                <label class="flex flex-row items-center justify-center text-sm text-gray-600" for="active">
                                    <i class="fas fa-check mr-3 text-green-500"></i> Active
                                </label>
                            @else
                                <label class="flex flex-row items-center justify-center text-sm text-gray-600" for="active">
                                    <i class="fas fa-times mr-3 text-red-500"></i> Inactive
                                </label>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
