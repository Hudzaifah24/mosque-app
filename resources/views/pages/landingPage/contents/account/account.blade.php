@extends('pages.landingPage.index')

@section('content')
    <main class="w-full flex justify-center flex-col p-6">
        <h1 class="w-full text-3xl text-black text-center">Akun Saya</h1>

        <div class="flex justify-center flex-wrap">
            <div class="lg:w-1/2 w-full my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <form action="{{ route('account.update.landing') }}" method="POST" class="p-10 bg-white rounded shadow-xl">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Name</label>
                            <input value="{{ old('name') ? old('name') : $user->name }}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nama" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input value="{{ old('email') ? old('email') : $user->email }}" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Email" aria-label="Email">
                        </div>
                        <div class="mt-6 flex gap-2">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                            <a href="{{ route('change.password.landing') }}" class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded">Ubah Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
