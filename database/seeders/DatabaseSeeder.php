<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('root'),
            'level' => 'admin'
        ]);
        \App\Models\User::create([
            'name' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('petugas'),
            'level' => 'petugas'
        ]);

        \App\Models\Kelas::create([
            'nama_kelas' => 'RPL 2', 'kopetensi_keahlian' => 'RPL'
        ]);
        \App\Models\Kelas::create(['nama_kelas' => 'RPL 1', 'kopetensi_keahlian' => 'RPL']);
        \App\Models\Kelas::create(['nama_kelas' => 'MM 1', 'kopetensi_keahlian' => 'MM']);
        \App\Models\Spp::create([
            'tahun' => '2023',
            'nominal' => '3500000'
        ]);
    }
}
