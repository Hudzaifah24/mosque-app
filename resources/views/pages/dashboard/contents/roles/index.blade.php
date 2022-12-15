@extends('pages.dashboard.index')

@section('role', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Rol</h1>

        @if (Auth::user()->role->name == 'Admin')
            <div class="mb-3">
                <a href="{{ route('role.create') }}" class="bg-blue-500 rounded-lg py-2 px-4 text-white"><i class="fas fa-plus mr-1"></i> Tambah Rol</a>
            </div>
        @endif

        <div class="w-full">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Semua Rol
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Rol
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Ditambahkan Pada
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $data)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $data->name }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $data->created_at }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if (Auth::user()->role->name == 'Admin')
                                        @if ($data->name != 'Admin')
                                            <a href="{{ route('role.edit', $data->id) }}" class="px-5 py-1 rounded-lg hover:bg-yellow-400 bg-yellow-300">edit</a>
                                            <form class="inline" action="{{ route('role.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                @php
                                                    $role = json_encode($data->name);
                                                @endphp
                                                <button onclick="return confirm('Apakah anda yakin? Jika IYA maka semua user yang memiliki rol '+ {{ $role }} +' akan ikut terhapus.')" type="submit" class="px-5 py-1 rounded-lg hover:bg-red-400 bg-red-300">delete</button>
                                            </form>
                                        @else
                                            Tetap!
                                        @endif
                                    @else
                                        <p>Hanya Admin!</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection