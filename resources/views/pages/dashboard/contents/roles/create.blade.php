@extends('pages.dashboard.index')

@section('role', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Tambah Rol</h1>

        <div class="flex flex-wrap">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-list mr-3"></i> Tambah Rol
                </p>
                <div class="leading-loose">
                    <form action="{{ route('role.store') }}" method="POST" class="p-10 bg-white rounded shadow-xl">
                        @csrf
                        @method('POST')
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Rol</label>
                            <input value="{{ old('name') }}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Role" aria-label="Role">
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
