@extends('pages.landingPage.index')

@section('content')
    <main class="w-full flex-grow pb-6">
        <ul>
            <li class="relative">
                <img class="w-full h-full bg-cover" src="{{ asset('image/slide1.jpg') }}" alt="slide 1">
                <button class="absolute top-0 z-50 lg:z-30 lg:left-0 right-0 p-3" id="btnCloseFullScreen" onclick="closeFullScreen('sm')"><svg width="30" height="30" viewBox="0 0 24 24"><path fill="#fff" d="M14,14H19V16H16V19H14V14M5,14H10V19H8V16H5V14M8,5H10V10H5V8H8V5M19,8V10H14V5H16V8H19Z" /></svg></button>
                <button class="absolute top-0 z-30 lg:z-50 lg:left-0 right-0 p-3" id="btnCloseFullScreen2" onclick="closeFullScreen('lg')"><svg width="30" height="30" viewBox="0 0 24 24"><path fill="#fff" d="M14,14H19V16H16V19H14V14M5,14H10V19H8V16H5V14M8,5H10V10H5V8H8V5M19,8V10H14V5H16V8H19Z" /></svg></button>
                <div class="absolute top-0 w-full h-full bg-black opacity-75"></div>
                <div class="absolute top-0 w-full h-full flex justify-center items-center flex-col">
                    <div class="flex flex-col">
                        <div class="flex lg:flex-col-reverse flex-col justify-center items-center ">
                            <div class="text-center rounded mt-2">
                                <div class="flex flex-row px-4">
                                    <p class="text-white font-black py-3 lg:text-9xl text-3xl" id="jam">0</p>
                                    <p class="text-white font-black py-3 lg:text-9xl text-3xl">&nbsp;:&nbsp;</p>
                                    <p class="text-white font-black py-3 lg:text-9xl text-3xl" id="menit">0</p>
                                    <p class="text-white font-black py-3 lg:text-9xl text-3xl">&nbsp;:&nbsp;</p>
                                    <p class="text-white font-black py-3 lg:text-9xl text-3xl" id="detik">0</p>
                                </div>
                                <p class="text-white font-black py-3 text-7xl lg:block hidden" id="tanggal"></p>
                            </div>
                            <div>
                                <p class="text-white text-center uppercase font-black lg:text-3xl text-xl text-ellipsis">Selamat datang</p>
                                <p class="text-white text-center uppercase font-black lg:text-7xl text-3xl text-ellipsis">MASJID AL-IKHLAS</p>
                            </div>
                        </div>
                        <div class="bg-white text-center rounded mt-3">
                            <div class="px-4 text-center">
                                <p class="text-black font-black py-3 lg:text-3xl text-xl uppercase" id="pray"></p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full absolute bottom-0 hidden lg:flex flex-wrap mt-6 p-5 ">
                        <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                            <div class="bg-blue-500 p-2 pl-4 rounded-t">
                                <span class="text-lg">
                                    Total Uang Kas
                                </span>
                            </div>
                            <div class="bg-white p-3 rounded-b">
                                <span class="font-bold text-xl cash">0</span>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                            <div class="bg-green-500 p-2 pl-4 rounded-t">
                                <span class="text-lg">
                                    Total Pemasukan
                                </span>
                            </div>
                            <div class="bg-white p-3 rounded-b">
                                <span class="font-bold text-xl income">0</span>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/3 pr-0">
                            <div class="bg-red-500 p-2 pl-4 rounded-t">
                                <span class="text-lg">
                                    Total Pengeluaran
                                </span>
                            </div>
                            <div class="bg-white p-3 rounded-b">
                                <span class="font-bold text-xl spend">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="bg-gray-300 rounded-b m-2 flex flex-col lg:flex-row justify-center lg:justify-between">
            <div class="p-5 w-full lg:w-1/2">
                <p class="text-center pb-6 text-xl font-bold" id="estimasi"></p>

                <div class="w-full mb-3">
                    <input id="input" list="kota" value="1204" class="py-2 px-3 rounded">
                    <datalist id="kota">
                    </datalist>
                    <button onclick="btnkota()" class="py-2 px-3 rounded bg-white">></button>
                </div>

                <div class="bg-white mx-auto overflow-auto">
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
                        <tbody id="sholat">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col">
                <div class="p-5 w-full">
                    <p class="text-center pb-6 text-xl font-bold">Kajian</p>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Judul
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Penceramah
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Jam / Tanggal
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="output">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-3 mt-6 p-5 lg:hidden">
                    <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                        <div class="bg-blue-500 p-2 pl-4 rounded-t">
                            <span class="text-lg">
                                Total Uang Kas
                            </span>
                        </div>
                        <div class="bg-white p-3 rounded-b">
                            <span class="font-bold text-xl" id="cash">0</span>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/3 pr-0 lg:pr-2">
                        <div class="bg-blue-500 p-2 pl-4 rounded-t">
                            <span class="text-lg">
                                Total Pemasukan
                            </span>
                        </div>
                        <div class="bg-white p-3 rounded-b">
                            <span class="font-bold text-xl" id="income">0</span>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/3 pr-0">
                        <div class="bg-red-500 p-2 pl-4 rounded-t">
                            <span class="text-lg">
                                Total Pengeluaran
                            </span>
                        </div>
                        <div class="bg-white p-3 rounded-b">
                            <span class="font-bold text-xl" id="spend">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        // JAM
        function time() {
            var clock = new Date();
            let hour = clock.getHours();
            let minute = clock.getMinutes();
            let second = clock.getSeconds();

            if (hour < 10) {
                hour = hour.toString();
                hour = hour.padStart(2, "0");
            }
            if (minute < 10) {
                minute = minute.toString();
                minute = minute.padStart(2, "0");
            }
            if (second < 10) {
                second = second.toString();
                second = second.padStart(2, "0");
            }

            document.getElementById('jam').innerHTML = hour;
            document.getElementById('menit').innerHTML = minute;
            document.getElementById('detik').innerHTML = second;

            setTimeout(time, 1000);
        }

        // Kota
        kota();

        let res = 1204;

        function btnkota() {
            let input = document.getElementById("input").value;
            res = input;

            sholat(res);
        }

        function kota() {
            fetch('https://api.myquran.com/v1/sholat/kota/semua')
            .then((response) => response.json())
            .then((data) => {
                let select = '';

                data.forEach((kota) => {
                    select += `
                        <option value="${kota.id}">
                            ${kota.lokasi}
                        </option>
                    `;
                });

                document.getElementById('kota').innerHTML = select;
            });
        }

        // Kajian
        window.setTimeout(kajian, 1000);

        function kajian() {
            fetch("{{ route('kajianAPI.index') }}")
            .then((response) => response.json())
            .then((data) => {
                console.log(data);

                output = '';

                if (data == '') {
                    output = `
                        <td class="text-center py-5" colspan="3">Kosong!</td>
                    `;
                } else {
                    data.forEach((kajian) => {
                        output += `
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        ${kajian.title}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        ${kajian.speaker}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        ${kajian.jam+' / '+kajian.tanggal}
                                    </p>
                                </td>
                            </tr>
                        `;
                    });
                }

                document.getElementById('output').innerHTML = output;
            })
            .catch((err) => console.log(err));
        }

        // Jadwal Sholat
        function sholat(kota = res) {
            let tanggal = new Date().getDate();
            let bulan = new Date().getMonth() + 1;
            let tahun = new Date().getFullYear();

            adzan(tanggal, bulan, tahun, kota);
            nextPray(tanggal, bulan, tahun, kota);

            fetch('https://api.myquran.com/v1/sholat/jadwal/'+kota+'/'+tahun+'/'+bulan+'/'+tanggal)
            .then((response) => response.json())
            .then((data) => {
                let sholat = '';
                let estimasi = `Jadwal Sholat ${data.data.lokasi} ${data.data.daerah}, <span class="text-white bg-blue-500 rounded py-1 px-2">${data.data.jadwal.tanggal}</span>`;

                sholatObj = data.data.jadwal;

                for (const key in sholatObj) {
                    if (key !== 'date' && key !== 'tanggal') {
                        sholat += `
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">${key}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <b class="text-gray-900 whitespace-no-wrap">
                                        ${sholatObj[key]}
                                    </b>
                                </td>
                            </tr>
                        `;
                    }
                }

                document.getElementById('estimasi').innerHTML = estimasi;
                document.getElementById('sholat').innerHTML = sholat;
                document.getElementById('tanggal').innerHTML = sholatObj.tanggal;

            })
            .catch((err) => console.log(err));
        }

        // Alarm Adzan
        function adzan(tanggal, bulan, tahun, kota) {
            let date = new Date();
            let hour = date.getHours();
            let minute = date.getMinutes();
            let second = date.getSeconds();

            if (hour < 10) {
                hour = hour.toString();
                hour = hour.padStart(2, "0");
            }
            if (minute < 10) {
                minute = minute.toString();
                minute = minute.padStart(2, "0");
            }
            if (second < 10) {
                second = second.toString();
                second = second.padStart(2, "0");
            }
            let clock = `${hour}:${minute}:${second}`;

            fetch('https://api.myquran.com/v1/sholat/jadwal/'+kota+'/'+tahun+'/'+bulan+'/'+tanggal)
            .then((response) => response.json())
            .then((data) => {
                let sholatObj = data.data.jadwal;

                for (const key in sholatObj) {
                    let jadwal = `${sholatObj[key]}:00`;

                    if (jadwal == clock) {
                        let audio = new Howl({
                            src: ["{{ asset('audio/adzan1.mp3') }}"],
                            loop: false,
                            autoplay: true,
                            // onend: function() {
                            //     console.log('Finised!');
                            //     confirm("Waktu Iqomah 10 detik lagi");
                            // }
                        });

                        audio.once('load', function() {
                            audio.play();
                        });
                    }
                }
            })
            .catch((err) => console.log(err));
        }

        // Next prayer
        function nextPray(tanggal, bulan, tahun, kota) {
            let date = new Date();
            let hour = date.getHours();
            let minute = date.getMinutes();
            let second = date.getSeconds();

            if (hour < 10) {
                hour = hour.toString();
                hour = hour.padStart(2, "0");
            }
            if (minute < 10) {
                minute = minute.toString();
                minute = minute.padStart(2, "0");
            }
            if (second < 10) {
                second = second.toString();
                second = second.padStart(2, "0");
            }
            let clock = `${hour}:${minute}`;


            fetch('https://api.myquran.com/v1/sholat/jadwal/'+kota+'/'+tahun+'/'+bulan+'/'+tanggal)
            .then((response) => response.json())
            .then((data) => {
                let sholatObj = data.data.jadwal;

                // let ex = {
                //     imsak: "04:00",
                //     subuh: "04:10",
                //     dzuhur: "05:00",
                //     ashar: "15:01",
                //     maghrib: "17:02",
                //     isya: "18:30",
                //     example: "15:40",
                // }

                let nextPrayer = "";

                let sholatmaghrib = sholatObj['maghrib'].split(":");
                let [h1, m1] = sholatmaghrib;

                let sholatisya = sholatObj['isya'].split(":");
                let [h2, m2] = sholatisya;

                let sholatimsak = sholatObj['imsak'].split(":");
                let [h3, m3] = sholatimsak;

                let sholatsubuh = sholatObj['subuh'].split(":");
                let [h4, m4] = sholatsubuh;

                let sholatterbit = sholatObj['terbit'].split(":");
                let [h5, m5] = sholatterbit;

                let sholatdhuha = sholatObj['dhuha'].split(":");
                let [h6, m6] = sholatdhuha;

                let sholatdzuhur = sholatObj['dzuhur'].split(":");
                let [h7, m7] = sholatdzuhur;

                let sholatashar = sholatObj['ashar'].split(":");
                let [h8, m8] = sholatashar;

                if(sholatObj['maghrib'] == clock && hour >= h1 && minute >= m1) {
                    nextPrayer = `Akan Tiba Waktu Sholat Isya <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['isya']}</span>`;
                } else if (sholatObj['isya'] == clock && hour >= h2 && minute >= m2) {
                    nextPrayer = `Akan Tiba Waktu Imsak <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['imsak']}</span>`;
                } else if (sholatObj['imsak'] == clock && hour >= h3 && minute >= m3) {
                    nextPrayer = `Akan Tiba Waktu Sholat Subuh <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['subuh']}</span>`;
                } else if (sholatObj['subuh'] == clock && hour >= h4 && minute >= m4) {
                    nextPrayer = `Akan Tiba Waktu Terbit <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['terbit']}</span>`;
                } else if (sholatObj['terbit'] == clock && hour >= h5 && minute >= m5) {
                    nextPrayer = `Akan Tiba Waktu Dhuha <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['dhuha']}</span>`;
                } else if (sholatObj['dhuha'] == clock && hour >= h6 && minute >= m6) {
                    nextPrayer = `Akan Tiba Waktu Sholat Dzuhur <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['dzuhur']}</span>`;
                } else if (sholatObj['dzuhur'] == clock && hour >= h7 && minute >= m7) {
                    nextPrayer = `Akan Tiba Waktu Sholat Ashar <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['ashar']}</span>`;
                } else if (sholatObj['ashar'] == clock && hour >= h8 && minute >= m8) {
                    nextPrayer = `Akan Tiba Waktu Sholat Maghrib <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['maghrib']}</span>`;
                } else {
                    nextPrayer = `Akan Tiba Waktu Imsak <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj['imsak']}</span>`;
                }

                console.log(nextPrayer);

                // for (const key in sholatObj) {
                //     let potong = sholatObj[key].split(":");
                //     let [h, m] = potong;


                //     if (h >= hour) {
                //         let name = key;
                //         let waktu = sholatObj[key];
                //         if (waktu != clock) {
                //             if (h >= hour) {
                //                 if (m > minute) {
                //                     nextPrayer = `Akan Tiba Sholat ${name} <span class="text-white bg-blue-500 py-1 px-2 rounded">${waktu}</span>`;
                //                 } else {
                //                     nextPrayer = `Akan Tiba Sholat ${name} <span class="text-white bg-blue-500 py-1 px-2 rounded">${waktu}</span>`;
                //                 }
                //                 break;
                //             } else {
                //                 if (clock == '00:00') {
                //                     nextPrayer = '...';
                //                 } else {
                //                     nextPrayer = `Akan Tiba imsak <span class="text-white bg-blue-500 py-1 px-2 rounded">${sholatObj.imsak}</span>`;
                //                 }
                //                 break;
                //             }
                //             break;
                //         }
                //         break;
                //     }
                // }

                document.getElementById('pray').innerHTML = nextPrayer;
            })
            .catch((err) => console.log(err));
        }

        // Uang Kas
        function cash() {
            fetch("{{ route('cashAPI.index') }}")
            .then((response) => response.json())
            .then((data) => {
                let uangKas = new Intl.NumberFormat('id-Id', {style: 'currency', currency: 'IDR'}).format(data.uangKas);
                let pemasukan = new Intl.NumberFormat('id-Id', {style: 'currency', currency: 'IDR'}).format(data.pemasukan);
                let pengeluaran = new Intl.NumberFormat('id-Id', {style: 'currency', currency: 'IDR'}).format(Number(data.pengeluaran));

                document.querySelector('.cash').innerHTML = uangKas;
                document.querySelector('.income').innerHTML = pemasukan;
                document.querySelector('.spend').innerHTML = pengeluaran;

                document.querySelector('#cash').innerHTML = uangKas;
                document.querySelector('#income').innerHTML = pemasukan;
                document.querySelector('#spend').innerHTML = pengeluaran;

            })
            .catch((err) => console.log(err));
        }

        reload();

        function reload(){
            time();
            sholat();
            cash();
            setTimeout(reload, 1000);
        };
    </script>
@endpush
