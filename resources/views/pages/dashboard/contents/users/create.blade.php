@extends('pages.dashboard.index')

@section('user', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Tambah Pengguna</h1>

        <div class="flex flex-wrap">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-list mr-3"></i> Tambah Pengguna
                </p>
                <div class="leading-loose">
                    <form action="{{ route('user.store') }}" method="POST" class="p-10 bg-white rounded shadow-xl">
                        @csrf
                        @method('POST')
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Name</label>
                            <input value="{{ old('name') }}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nama" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input value="{{ old('email') }}" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Email" aria-label="Email">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="role">Role</label>
                            <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" name="role_id" id="role" required>
                                <option disabled selected value="[Select One]">[Select One]</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password">Password</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="text" required="" placeholder="Password" aria-label="password">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password_confirmation">Konfirmasi Password</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password_confirmation" name="password_confirmation" type="password" required="" placeholder="Ulangi Password" aria-label="password_confirmation">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="status">Status</label>
                            <div class="flex gap-10">
                                <label class="flex flex-col text-sm text-gray-600" for="active">
                                    Active
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="active" name="status" value="active" type="radio" required="">
                                </label>
                                <label class="flex flex-col text-sm text-gray-600" for="inactive">
                                    Inactive
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="inactive" name="status" value="inactive" type="radio" required="">
                                </label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
