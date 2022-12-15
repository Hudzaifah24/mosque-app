<?php

namespace Database\Seeders;

use App\Models\Kajian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kajian::truncate();

        Kajian::create([
            'title' => 'Hari Kiamat',
            'status' => 'active',
            'speaker' => 'ust.Hudzaifah',
            'desc' => '<p>Masjid akan mengadakan kajian offline mengenai Hari Kiamat bersama ust.Hudzaifah.lc.<p>',
            'jam' => '05:00:00',
            'tanggal' => '2022-1-1'
        ]);
    }
}
