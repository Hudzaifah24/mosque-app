@extends('pages.dashboard.index')

@section('jadwalSholat', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Jadwal Sholat</h1>

        <p class="text-xl pb-6">
            <i class="fas fa-list mr-3"></i> Jadwal Sholat Pada Hari Ini / <strong>{{ $sholat['tanggal'] }}</strong>
        </p>

        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Sholat
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jadwal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Imsak</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['imsak'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Subuh</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['subuh'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Terbit</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['terbit'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Dhuha</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['dhuha'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Dzuhur</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['dzuhur'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Ashar</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['ashar'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Maghrib</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['maghrib'] }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Isya</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <b class="text-gray-900 whitespace-no-wrap">
                                {{ $sholat['isya'] }}
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
