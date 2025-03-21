<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminStatistikController extends Controller
{
    public function index(Request $request)
    {
        // Tahun-tahun yang ingin ditampilkan (misal 5 tahun terakhir)
        $currentYear = date('Y');
        $years = range($currentYear - 4, $currentYear);
    
        // Data untuk grafik 5 tahun terakhir
        $fiveYearStats = Visitor::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
            ->whereIn(DB::raw('YEAR(created_at)'), $years)
            ->groupBy('year')
            ->orderBy('year')
            ->get();
    
        // Tahun terpilih untuk grafik bulanan
        $selectedYear = $request->year ?? $currentYear;
    
        // Statistik pengunjung bulanan
        $monthlyStats = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $selectedYear)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
    
        // Data multiYearMonthlyStats untuk grafik garis
        $multiYearMonthlyStats = [];
        foreach ($years as $year) {
            $dataBulanan = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('total', 'month')
                ->toArray();
    
            $multiYearMonthlyStats[$year] = $dataBulanan;
        }
    
        // Data Statistik Pengunjung Item
        $selectedYear = $request->year ?? date('Y');
        $selectedCategory = $request->kategori ?? 'Semua';
        
        // Query ambil data visitor, jumlah pengunjung berdasarkan item_id
        $itemQuery = Visitor::select(
                'item_id',
                'item_judul',
                'item_kategori',
                DB::raw('COUNT(*) as jumlah_pengunjung') // jumlah total berdasarkan item_id
            )
            ->whereNotNull('item_id')
            ->whereYear('created_at', $selectedYear)
            ->groupBy('item_id', 'item_judul', 'item_kategori');
        
        // Jika kategori dipilih
        if ($selectedCategory != 'Semua') {
            $itemQuery->where('item_kategori', $selectedCategory);
        }
        
        // Ambil data
        $pengunjungItems = $itemQuery->orderByDesc('jumlah_pengunjung')->get();
        
        // Mapping kategori
        $kategoriMap = [
            'video' => 'Video Edukasi',
            'book' => 'Elektronik Buku',
        ];
        
        $pengunjungItems = $pengunjungItems->map(function ($item) use ($kategoriMap) {
            $item->kategori_nama = $kategoriMap[$item->item_kategori] ?? 'Lainnya';
            return $item;
        });
        
        $successMessage = null;
        if ($request->has('year')) {
            $successMessage = 'Tahun ' . $selectedYear . ' berhasil dipilih!';
        }
    
        return view('admin.pages.statistik.index', compact(
            'fiveYearStats',
            'selectedYear',
            'years',
            'monthlyStats',
            'multiYearMonthlyStats',
            'successMessage',
            'pengunjungItems',
            'selectedCategory'
        ))->with('title', 'Admin Statistik Kunjungan | Edulantas');
    }

    public function download(Request $request)
    {
        $type = $request->type;
        $year = $request->year ?? date('Y');
        $kategori = $request->kategori ?? 'Semua';
    
        if ($type === 'multiyear') {
            $currentYear = date('Y');
            $startYear = $currentYear - 4;
            $years = range($currentYear - 4, $currentYear);
            $multiYearMonthlyStats = [];
        
            foreach ($years as $y) {
                $dataBulanan = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                    ->whereYear('created_at', $y)
                    ->groupBy('month')
                    ->pluck('total', 'month')
                    ->toArray();
                $multiYearMonthlyStats[$y] = $dataBulanan;
            }

            function bulanIndo($bulan)
            {
                $bulanIndo = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ];
                return $bulanIndo[$bulan];
            }
        
            // Buat format tanggal sesuai permintaan
            $tanggal = date('d') . ' ' . bulanIndo(date('m')) . ' ' . date('Y');

            // Variabel periode dalam format "2021 s/d 2025"
            $periode = "$startYear s/d $currentYear";
        
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-multiyear', compact('multiYearMonthlyStats', 'years', 'tanggal', 'periode'))
                ->setPaper('a4', 'portrait');
        
            return $pdf->download("Laporan-Perbandingan-5-Tahun_{$tanggal}.pdf");        
    
        } elseif ($type === 'monthly') {
            $monthlyStats = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('total', 'month')
                ->toArray();
            
            function bulanIndo($bulan)
            {
                $bulanIndo = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ];
                return $bulanIndo[$bulan];
            }
        
            // Buat format tanggal sesuai permintaan
            $tanggal = date('d') . ' ' . bulanIndo(date('m')) . ' ' . date('Y');
    
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-monthly', compact('monthlyStats', 'year', 'tanggal'))
                ->setPaper('a4', 'portrait');
            return $pdf->download("Laporan-Pengunjung-Tahun-{$year}_{$tanggal}.pdf");
    
        } elseif ($type === 'items') {
            $itemQuery = Visitor::select('item_id', 'item_judul', 'item_kategori', DB::raw('COUNT(*) as jumlah_pengunjung'))
                ->whereYear('created_at', $year)
                ->groupBy('item_id', 'item_judul', 'item_kategori');
    
            if ($kategori != 'Semua') {
                $itemQuery->where('item_kategori', $kategori);
            }

            function bulanIndo($bulan)
            {
                $bulanIndo = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ];
                return $bulanIndo[$bulan];
            }
        
            // Buat format tanggal sesuai permintaan
            $tanggal = date('d') . ' ' . bulanIndo(date('m')) . ' ' . date('Y');
    
            $pengunjungItems = $itemQuery->orderByDesc('jumlah_pengunjung')->get();

            $kategoriDisplay = 'Elektronik Buku dan Video Edukasi';
            if ($kategori === 'book') {
                $kategoriDisplay = 'Elektronik Buku';
            } elseif ($kategori === 'video') {
                $kategoriDisplay = 'Video Edukasi';
            }
    
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-items', compact('pengunjungItems', 'year', 'kategori', 'tanggal', 'kategoriDisplay'))
                ->setPaper('a4', 'portrait');
            return $pdf->download("Laporan-Item-Tahun-{$year}-Kategori-{$kategori}_{$tanggal}.pdf");
        }

        elseif ($type === 'all') {
            $currentYear = date('Y');
            $startYear = $currentYear - 4;
            $years = range($startYear, $currentYear);
        
            // Data multi-year
            $multiYearMonthlyStats = [];
            foreach ($years as $y) {
                $dataBulanan = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                    ->whereYear('created_at', $y)
                    ->groupBy('month')
                    ->pluck('total', 'month')
                    ->toArray();
                $multiYearMonthlyStats[$y] = $dataBulanan;
            }
        
            // Data monthly
            $year = $request->year ?? $currentYear;
            $monthlyStats = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('total', 'month')
                ->toArray();
        
            // Data items
            $kategori = $request->kategori ?? 'Semua';

            $itemQuery = Visitor::select('item_id', 'item_judul', 'item_kategori', DB::raw('COUNT(*) as jumlah_pengunjung'))
                ->whereYear('created_at', $year)
                ->whereNotNull('item_id')
                ->whereNotNull('item_judul')
                ->whereNotNull('item_kategori')
                ->where('item_id', '!=', '')
                ->where('item_judul', '!=', '')
                ->where('item_kategori', '!=', '')
                ->groupBy('item_id', 'item_judul', 'item_kategori');

            if ($kategori != 'Semua') {
                $itemQuery->where('item_kategori', $kategori);
            }

            $pengunjungItems = $itemQuery->get();

        
            // Fungsi bulanIndo
            function bulanIndo($bulan)
            {
                $bulanIndo = [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                    '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
                ];
                return $bulanIndo[str_pad($bulan, 2, '0', STR_PAD_LEFT)];
            }
        
            // Tanggal dan periode
            $tanggal = date('d') . ' ' . bulanIndo(date('m')) . ' ' . date('Y');
            $periode = "$startYear s/d $currentYear";
        
            // Kategori display
            $kategoriDisplay = 'Elektronik Buku dan Video Edukasi';
            if ($kategori === 'book') {
                $kategoriDisplay = 'Elektronik Buku';
            } elseif ($kategori === 'video') {
                $kategoriDisplay = 'Video Edukasi';
            }
        
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-keseluruhan', compact(
                'multiYearMonthlyStats', 'years', 'monthlyStats', 'year', 'pengunjungItems', 'kategori', 'kategoriDisplay', 'tanggal', 'periode'
            ))->setPaper('a4', 'portrait');
        
            return $pdf->download("Laporan-Keseluruhan_{$tanggal}.pdf");
        }        
    
        return back();
    }    
}
