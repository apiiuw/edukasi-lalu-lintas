<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            'Beranda',
            'Repositori',
            'Tentang Kami',
            'Forum Diskusi',
        ];

        for ($i = 0; $i < 1000; $i++) {
            $randomDate = Carbon::create(
                rand(2021, 2024),   // tahun
                rand(1, 12),        // bulan
                rand(1, 28),        // hari
                rand(0, 23),        // jam
                rand(0, 59),        // menit
                rand(0, 59)         // detik
            );

            Visitor::create([
                'name'           => 'tamu',
                'email'          => null,
                'visit_date'     => $randomDate,
                'page'           => $pages[array_rand($pages)],
                'item_id'        => null,
                'item_judul'     => null,
                'item_kategori'  => null,
                'created_at'     => $randomDate,
                'updated_at'     => $randomDate,
            ]);
        }
    }
}
