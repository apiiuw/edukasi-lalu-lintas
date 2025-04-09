<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorSeeder extends Seeder
{
    public function run()
    {
        // 1. Mengosongkan Tabel 'visitors'
        Visitor::truncate();

        // 2. Menambahkan Data Pengunjung Berdasarkan Bulan dan Tahun
        $visitorsData = [
            ['month' => 11, 'year' => 2024, 'count' => 481],
            ['month' => 12, 'year' => 2024, 'count' => 42],
            ['month' => 1, 'year' => 2025, 'count' => 6],
            ['month' => 2, 'year' => 2025, 'count' => 30],
            ['month' => 3, 'year' => 2025, 'count' => 8],
        ];

        foreach ($visitorsData as $data) {
            for ($i = 0; $i < $data['count']; $i++) {
                $visitDate = Carbon::createFromDate($data['year'], $data['month'], rand(1, 28)); // Acak tanggal kunjungan
                Visitor::create([
                    'name' => 'Tamu',  // Nama pengunjung diganti menjadi 'Tamu'
                    'email' => null,  // Email dikosongkan
                    'visit_date' => $visitDate->toDateString(),  // Tanggal kunjungan
                    'page' => 'Detail Item',  // Nama halaman
                    'item_id' => null,  // Item ID dikosongkan
                    'item_judul' => 'Model Pengintegrasian Pendidikan Lalu Lintas Kelas 1 SD MI',  // Judul item acak
                    'item_kategori' => 'book',  // Kategori item
                    'created_at' => $visitDate, // Sesuaikan dengan visit_date
                    'updated_at' => $visitDate, // Sesuaikan dengan visit_date
                ]);
            }
        }

        // 3. Menambahkan Pengunjung Secara Acak Berdasarkan Total Pengunjung untuk Buku dan Video
        $items = [
            'Model Pengintegrasian Pendidikan Lalu Lintas Kelas 1 SD MI' => [28, 2024],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XII' => [19, 2024],
            'Model Pengintegrasian Pendidikan Lalu Lintas Kelas X SMA/MA dan SMK/MAK' => [16, 2024],
            'Keselamatan Lalu Lintas Jalan' => [15, 2024],
            'Model Pengintegrasian Pendidikan Lalu Lintas Kelas VII SMP MTs' => [14, 2024],
            'Yuk, Utamakan Keselamatan Lalu Lintas' => [10, 2024],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SD MI Kelas VI' => [5, 2024],
            'Diseminasi Kurikulum Merdeka Pendidikan Lalu Lintas SMP Kelas VII' => [4, 2024],
            'Keselamatan Lalu Lintas' => [4, 2024],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SD MI Kelas III' => [1, 2024],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XII' => [9, 2025],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XI' => [3, 2025],
            'Diseminasi Kurikulum Merdeka Pendidikan Lalu Lintas SMP Kelas VII' => [2, 2025],
            'Yuk, Utamakan Keselamatan Lalu Lintas' => [1, 2025],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SD MI Kelas III' => [1, 2025],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SMP Kelas IX' => [1, 2025],
            'Diseminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas X' => [1, 2025],
        ];

        foreach ($items as $judul => [$totalPengunjung, $tahun]) {
            for ($i = 0; $i < $totalPengunjung; $i++) {
                $visitDate = Carbon::createFromDate($tahun, rand(1, 12), rand(1, 28)); // Acak tanggal kunjungan
                Visitor::create([
                    'name' => 'Tamu',  // Nama pengunjung diganti menjadi 'Tamu'
                    'email' => null,  // Email dikosongkan
                    'visit_date' => $visitDate->toDateString(),
                    'page' => 'Detail Item',
                    'item_id' => null,  // ID acak
                    'item_judul' => $judul,
                    'item_kategori' => 'book',
                    'created_at' => $visitDate, // Sesuaikan dengan visit_date
                    'updated_at' => $visitDate, // Sesuaikan dengan visit_date
                ]);
            }
        }
    }
}
