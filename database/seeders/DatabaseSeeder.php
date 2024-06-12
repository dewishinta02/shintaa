<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        //Prodi::factory(10)->create();

        Prodi::create([
            'nama_prodi' => 'Bisnis Digital'
        ]);

        Prodi::create([
            'nama_prodi' => 'Manajemen Informatika'
        ]);
        Prodi::factory(10)->create();

        Mahasiswa::create([
            'nim' => 'E020322113',
            'nama' => 'Shinta',
            'no_hp' => '081549550194',
            'alamat' => 'kelayan A',
            'foto' => 'Foto Sinta.jpeg',
            'password' => '123',
            'prodi_id' => 1,
        ]);

        Mahasiswa::create([
            'nim' => 'E020322114',
            'nama' => 'Shinta',
            'no_hp' => '081549550194',
            'alamat' => 'kelayan A',
            'foto' => 'Foto Sinta.jpeg',
            'password' => '123',
            'prodi_id' => 2,
        ]);

        Mahasiswa::factory(100)->create();
    }
}
