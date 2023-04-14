<?php

namespace Database\Seeders;
use App\Models\Trip;
use App\Models\User;
use App\Models\Pelanggan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Transaksi::factory(50)->create();
        Pelanggan::factory(20)->create();

        Transaksi::create([
            'nama' => 'abu',
            'pelanggan_id' => '1',
            'user_id' => '1',
            'tonase' => '400',
            'harga' => '1000',
            'potongan' => '400000'
        ]);

        Transaksi::create([
            'nama' => 'Biba',
            'pelanggan_id' => '2',
            'user_id' => '2',
            'tonase' => '500',
            'harga' => '1000',
            'potongan' => '500000'
        ]);
        User::create([
            'name' => 'fayyad',
            'username' => 'fayyad',
            'email' => 'fayyad@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => true,
            'password' => '$2y$10$GLnLyevELvak5Cn.G9lJpO7cNGruDlWGSM1H849vlXeX5p7yY6MTC', //password: fayyad
        
        ]);
      
    }
}
