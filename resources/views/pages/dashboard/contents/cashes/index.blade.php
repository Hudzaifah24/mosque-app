@extends('pages.dashboard.index')

@section('cash', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black mb-6">Uang Kas</h1>

        @if (Auth::user()->role->name == 'Admin')
            <div class="mb-3">
                <a href="{{ route('cash.create') }}" class="bg-blue-500 rounded-lg py-2 px-4 text-white"><i class="fas fa-plus mr-1"></i> Tambah Uang Kas</a>
            </div>
        @endif

        <div class="flex flex-wrap mt-6">
            <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                <div class="bg-blue-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Total Uang Kas
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format($res) }}</span>
                </div>
            </div>
            <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                <div class="bg-green-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Pemasukan Minggu Ini
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format($resWeek) }}</span>
                </div>
            </div>
            <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                <div class="bg-red-500 p-2 pl-4 rounded">
                    <span class="text-lg">
                        Total Pengeluaran
                    </span>
                </div>
                <div class="bg-white p-3 rounded">
                    Rp <span class="font-bold text-xl">{{ number_format(preg_replace("/-/", "",$pengeluaran)) }}</span>
                </div>
            </div>
        </div>



        <div class="flex flex-wrap mt-6">
            <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-plus mr-3"></i> Pemasukan Mingguan
                </p>
                <div class="p-6 bg-white">
                    <canvas id="chartOne" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-plus mr-3"></i> Pemasukan Bulanan
                </p>
                <div class="p-6 bg-white">
                    <canvas id="chartTwo" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        @if (Auth::user()->role->name == 'Admin')
            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Semua Catatan Uang Kas
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Waktu</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($cashes as $cash)
                                <tr>
                                    <td class="text-left py-3 px-4 border-b border-gray-200">Rp {{ number_format($cash->amount) }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        @if ($cash->status == 'income')
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Pemasukan</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Pengeluaran</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-left py-3 px-4 border-b border-gray-200">{{ $cash->date }}</td>
                                    <td class="text-left py-3 px-4 border-b border-gray-200">{!! Str::substr($cash->desc, 0, 8) . '...' !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
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
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Ahad'],
                datasets: [{
                    label: '# of Week',
                    data: [{{ $days['senin'].','.$days['selasa'].','.$days['rabu'].','.$days['kamis'].','.$days['jumat'].','.$days['sabtu'].','.$days['ahad'] }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(000, 000, 00, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(000, 000, 000, 1)',
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
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: '# of Month',
                    data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
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
