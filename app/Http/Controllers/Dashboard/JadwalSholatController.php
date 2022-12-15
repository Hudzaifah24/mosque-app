<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class JadwalSholatController extends Controller
{
    public function index()
    {
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
                'tanggal' => 'Masalah Jaringan',
            ];
        }

        return view('pages.dashboard.contents.jadwal_sholat.index', compact('sholat'));
    }
}
