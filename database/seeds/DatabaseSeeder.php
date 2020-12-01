<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ThanhToanTableSeeder::class);
        $this->call(LoaiTableSeeder::class);
        $this->call(SanPhamTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(MauTableSeeder::class);
    }
}
