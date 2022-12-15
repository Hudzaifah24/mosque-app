<footer class="w-full bg-white flex items-center justify-between">
    @php
        try {
            $sholat = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/682/tanggal/'.date("Y-m-d"))->json()['jadwal']['data'];
        } catch (\Throwable $th) {
            $sholat = [
                'imsak' => 'Masalah Jaringan',
                'subuh' => 'Masalah Jaringan',
                'terbit' => 'Masalah Jaringan',
                'dhuha' => 'Masalah Jaringan',
                'dzuhur' => 'Masalah Jaringan',
                'ashar' => 'Masalah Jaringan',
                'maghrib' => 'Masalah Jaringan',
                'isya' => 'Masalah Jaringan',
                'tanggal' => 'Masalah Jaringan'
            ];
        }
    @endphp
    <marquee loop="-1" class="bg-blue-300 py-1">{{ 'Jadwal-jadwal sholat pada hari ini atau '.$sholat['tanggal'].' daerah bogor jatuh pada pukul: Imsak:'.$sholat['imsak'].', Subuh: '.$sholat['subuh'].', Terbit: '.$sholat['terbit'].', Dhuha: '.$sholat['dhuha'].', Dzuhur: '.$sholat['dzuhur'].', Ashar: '.$sholat['ashar'].', Maghrib: '.$sholat['maghrib'].', Isya: '.$sholat['isya'].'. Sekian Terimakasih...'; }}</marquee>
    <div class="px-3 py-1">
        <p>
            Develop by <a target="_blank" href="https://hudzaifah24.github.io/Portfolio/" class="underline">Hudzaifah</a>.
        </p>
    </div>
</footer>
