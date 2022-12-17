@extends('pages.dashboard.index')

@section('dashboard', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black">Dashboard</h1>

        <div class="flex gap-5 lg:gap-0 flex-wrap mt-6">
            <div class="w-full lg:w-1/4 pr-0 lg:pr-2">
                <div class="bg-blue-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Total Uang Kas
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format($uangKas) }}</span>
                </div>
            </div>
            <div class="w-full lg:w-1/4 pr-0 lg:pr-2">
                <div class="bg-red-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Total Pengeluaran
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format(preg_replace("/-/", "", $pengeluaran)) }}</span>
                </div>
            </div>
            <div class="w-full lg:w-1/4 pr-0 lg:pr-2">
                <div class="bg-green-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Pemasukan Mingguan
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format($pemasukanMingguan) }}</span>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="bg-yellow-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Pengeluaran Mingguan
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format(preg_replace("/-/", "", $pengeluaranMingguan)) }}</span>
                </div>
            </div>
        </div>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Laporan Kajian Terakhir
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Judul</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Pembicara</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($kajians as $kajian)
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4">{{ $kajian->title }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $kajian->speaker }}</td>
                                <td class="text-left py-3 px-4">{{ $kajian->jam.' / '.$kajian->tanggal }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center py-5">Kosong!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@push('script')

    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
