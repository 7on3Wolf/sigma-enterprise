<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Category;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar layanan berdasarkan kategori
        $services = [
            [
                'name' => 'Instalasi Listrik untuk Rumah dan Gedung',
                'description' => 'Instalasi listrik handal untuk rumah dan gedung.',
                'icon' => 'electricity.png',
                'category' => 'Layanan Pemasangan Kelistrikan',
            ],
            [
                'name' => 'Instalasi Panel Listrik',
                'description' => 'Pemasangan panel listrik yang aman dan berkualitas.',
                'icon' => 'panel.png',
                'category' => 'Layanan Pemasangan Kelistrikan',
            ],
            [
                'name' => 'Pemasangan Sistem Tenaga Surya (Solar Panel)',
                'description' => 'Solusi energi terbarukan dengan panel surya.',
                'icon' => 'solar_panel.png',
                'category' => 'Layanan Pemasangan Kelistrikan',
            ],
            [
                'name' => 'Instalasi Jaringan Komputer (LAN/Wi-Fi)',
                'description' => 'Jaringan komputer stabil untuk rumah atau kantor.',
                'icon' => 'network.png',
                'category' => 'Layanan Pemasangan Teknologi Informasi (TI)',
            ],
            [
                'name' => 'Pemasangan Sistem CCTV untuk Keamanan',
                'description' => 'Keamanan rumah dan kantor dengan sistem CCTV.',
                'icon' => 'cctv.png',
                'category' => 'Layanan Pemasangan Teknologi Informasi (TI)',
            ],
            [
                'name' => 'Pemasangan Mesin Cuci dan Peralatan Rumah Tangga',
                'description' => 'Pemasangan mesin cuci dan peralatan rumah lainnya.',
                'icon' => 'washing_machine.png',
                'category' => 'Layanan Pemasangan Peralatan Elektronik',
            ],
            [
                'name' => 'Pemasangan AC (Air Conditioner) dan Sistem Pendingin',
                'description' => 'Pemasangan AC yang hemat energi dan nyaman.',
                'icon' => 'ac.png',
                'category' => 'Layanan Pemasangan Sistem Pemanas dan Pendingin',
            ],
            [
                'name' => 'Instalasi Fiber Optik dan Koneksi Internet Cepat',
                'description' => 'Koneksi internet cepat dengan fiber optik.',
                'icon' => 'fiber_optic.png',
                'category' => 'Layanan Pemasangan Infrastruktur Jaringan',
            ],
            [
                'name' => 'Instalasi Alarm Kebakaran dan Keamanan',
                'description' => 'Pemasangan sistem alarm untuk kebakaran dan keamanan.',
                'icon' => 'alarm.png',
                'category' => 'Layanan Pemasangan Sistem Keamanan',
            ],
        ];

        // Loop data layanan dan tambahkan ke database
        foreach ($services as $service) {
            $category = Category::where('name', $service['category'])->first();

            if ($category) {
                Service::create([
                    'name' => $service['name'],
                    'description' => $service['description'],
                    'icon' => $service['icon'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
