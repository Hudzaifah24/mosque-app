@extends('pages.dashboard.index')

@section('user', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Ubah Pengguna</h1>

        <div class="flex flex-wrap">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-list mr-3"></i> Ubah Pengguna
                </p>
                <div class="leading-loose">
                    {{-- reset Password --}}
                    <form id="reset" method="POST" action="{{ route('reset.password', $user->id) }}">
                        @csrf
                        @method('PUT')
                    </form>

                    {{-- Edit User --}}
                    <form action="{{ route('user.update', $user->id) }}" method="POST" class="p-10 bg-white rounded shadow-xl">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Name</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nama" aria-label="Name" value="{{ $user->name }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Email" aria-label="Email" value="{{ $user->email }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="role">Role</label>
                            <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" name="role_id" id="role" required>
                                <option disabled selected value="[Select One]">[Select One]</option>
                                @foreach ($roles as $role)
                                    <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="status">Status</label>
                            <div class="flex gap-10">
                                <label class="flex flex-col text-sm text-gray-600" for="active">
                                    Active
                                    <input {{ $user->status == 'active' ? 'checked' : '' }} class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="active" name="status" value="active" type="radio" required="">
                                </label>
                                <label class="flex flex-col text-sm text-gray-600" for="inactive">
                                    Inactive
                                    <input {{ $user->status == 'inactive' ? 'checked' : '' }} class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="inactive" name="status" value="inactive" type="radio" required="">
                                </label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded" type="submit" form="reset">Reset Password</button>
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
