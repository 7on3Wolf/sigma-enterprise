<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Layanan Pemasangan Kelistrikan',
            'Layanan Pemasangan Teknologi Informasi (TI)',
            'Layanan Pemasangan Peralatan Elektronik',
            'Layanan Pemasangan Infrastruktur Jaringan',
            'Layanan Pemasangan Sistem Keamanan',
            'Layanan Pemasangan Sistem Pemanas dan Pendingin',
            'Layanan Pemasangan dan Perawatan',
            'Layanan Pemasangan Sistem Energi Terbarukan',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
