<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Hudzaifah',
            'email' => 'hudz1357@gmail.com',
            'password' => Hash::make(12345678),
            'status' => 'active',
            'role_id' => 1
        ]);
    }
}
