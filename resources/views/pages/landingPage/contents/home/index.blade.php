@extends('pages.landingPage.index')

@section('content')
    <main class="w-full flex-grow pb-6">
        <div class="splide" role="group" aria-label="Splide Basic HTML Example">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    <i class="fas fa-chevron-right text-xl"></i>
                </button>
                <button class="splide__arrow splide__arrow--next">
                    <i class="fas fa-chevron-right text-xl"></i>
                </button>
          </div>
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide relative">
                        <img class="w-full h-full bg-cover" src="{{ asset('image/slide1.jpg') }}" alt="slide 3">
                        <div class="absolute top-0 w-full h-full bg-black opacity-75"></div>
                        <div class="absolute top-0 w-full h-full flex justify-center items-center flex-col">
                            <p class="text-white text-center uppercase font-black text-xl text-ellipsis">Selamat datang</p>
                            <p class="text-white text-center uppercase font-black text-3xl text-ellipsis">MASJID AL-IKHLAS</p>
                            <div class="bg-white text-center rounded mt-2">
                                <p class="text-black font-bold bg-blue-300 rounded-t py-1 px-2">Jam</p>
                                <div class="flex flex-row px-4">
                                    <p class="text-black font-black py-3 text-3xl" id="jam">0</p>
                                    <p class="text-black font-black py-3 text-3xl">&nbsp;:&nbsp;</p>
                                    <p class="text-black font-black py-3 text-3xl" id="menit">0</p>
                                    <p class="text-black font-black py-3 text-3xl">&nbsp;:&nbsp;</p>
                                    <p class="text-black font-black py-3 text-3xl" id="detik">0</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide relative">
                        <img class="w-full h-full bg-cover" src="{{ asset('image/slide2.jpg') }}" alt="slide 1">
                        <div class="absolute top-0 w-full h-full bg-black opacity-75"></div>
                        <div class="absolute top-0 w-full h-full flex justify-center items-center flex-col">
                            <p class="text-white text-center uppercase font-black text-xl text-ellipsis">Selamat datang</p>
                            <p class="text-white text-center uppercase font-black text-3xl text-ellipsis">MASJID AL-IKHLAS</p>
                            <div class="bg-white text-center rounded mt-2">
                                <p class="text-black font-bold bg-blue-300 rounded-t py-1 px-2">Akan Tiba Sholat Dzuhur</p>
                                <p class="text-black font-black py-3 px-5 text-3xl">12:00 WIB</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide relative">
                        <img class="w-full h-full bg-cover" src="{{ asset('image/slide3.jpg') }}" alt="slide 2">
                        <div class="absolute top-0 w-full h-full bg-black opacity-75"></div>
                        <div class="absolute top-0 w-full h-full flex justify-center items-center flex-col">
                            <p class="text-white text-center uppercase font-black text-xl text-ellipsis">Selamat datang</p>
                            <p class="text-white text-center uppercase font-black text-3xl text-ellipsis">MASJID AL-IKHLAS</p>
                            <div class="bg-white text-center rounded mt-2">
                                <p class="text-black font-bold bg-blue-300 rounded-t py-1 px-2">Kajian Rutin</p>
                                <p class="text-black font-black py-1 px-2">Fiqh Muamalat : 05:00 WIB</p>
                                <p class="text-black font-black py-1 px-2">Aqidah Usul : 19:00 WIB</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <div class="bg-gray-300 rounded-b m-2 flex flex-col lg:flex-row justify-center lg:justify-between">
            <div class="p-5 w-full lg:w-1/2">
                <p class="text-center pb-6 text-xl font-bold" id="estimasi"></p>

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

            <div class="p-5 w-full lg:w-1/2">
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
        </div>
    </main>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Slide
        var splide = new Splide( '.splide', {
            type: 'loop',
        } );
        splide.mount();

        // JAM
        window.setTimeout(time, 1000);

        function time() {
            var clock = new Date();
            setTimeout(time, 1000);
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
        window.setTimeout(sholat, 1000);

        function sholat() {
            let tanggal = new Date().getDate();
            let bulan = new Date().getMonth();
            let tahun = new Date().getFullYear();

            fetch('https://api.myquran.com/v1/sholat/jadwal/1204/'+tahun+'/'+bulan+'/'+tanggal)
            .then((response) => response.json())
            .then((data) => {
                let sholat = '';
                let estimasi = 'Jadwal Sholat '+data.data.lokasi+' '+data.data.daerah;

                sholatObj = data.data.jadwal;

                for (const key in sholatObj) {
                    if (key !== 'date') {
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
            })
            .catch((err) => console.log(err));
        }

        // Alarm Adzan
        window.setTimeout(adzan, 1000)

        function adzan() {
            window.setTimeout(reload, 1000)

            function reload(){
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

                console.log(clock);

                if (!this.audio) {
                    setTimeout(reload, 1000);
                }

                if ('11:30' == clock) {
                    // let audio = new Howl({
                    //     src: ["{{ asset('audio/adzan1.mp3') }}"],
                    //     loop: false,
                    //     autoplay: true,
                    //     // onend: function() {
                    //     //     console.log('Finised!');
                    //     // }
                    // });

                    // audio.once('load', function() {
                    //     audio.play();
                    // });
                    console.log('Berasil siii!!!');
                }
            }

            fetch('https://api.myquran.com/v1/sholat/jadwal/1204/'+tahun+'/'+bulan+'/'+tanggal)
            .then((response) => response.json())
            .then((data) => {
                let sholatObj = data.data.jadwal;

                for (const key in sholatObj) {
                    if (sholatObj[key] == clock) {
                        window.setTimeout(() => {
                            let audio = new Howl({
                                src: ["{{ asset('audio/adzan1.mp3') }}"],
                                loop: false,
                                autoplay: true,
                                // onend: function() {
                                //     console.log('Finised!');
                                // }
                            });

                            audio.once('load', function() {
                                audio.play();
                            });
                        }, 1000);
                    }
                }
            });
        }
    </script>
@endpush
