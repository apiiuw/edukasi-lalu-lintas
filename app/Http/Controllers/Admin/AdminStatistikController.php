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
    
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-multiyear', compact('multiYearMonthlyStats', 'years'))
                ->setPaper('a4', 'portrait');
            return $pdf->download('Laporan-Perbandingan-5-Tahun.pdf');
    
        } elseif ($type === 'monthly') {
            $monthlyStats = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('total', 'month')
                ->toArray();
    
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-monthly', compact('monthlyStats', 'year'))
                ->setPaper('a4', 'portrait');
            return $pdf->download("Laporan-Pengunjung-Tahun-$year.pdf");
    
        } elseif ($type === 'items') {
            $itemQuery = Visitor::select('item_id', 'item_judul', 'item_kategori', DB::raw('COUNT(*) as jumlah_pengunjung'))
                ->whereYear('created_at', $year)
                ->groupBy('item_id', 'item_judul', 'item_kategori');
    
            if ($kategori != 'Semua') {
                $itemQuery->where('item_kategori', $kategori);
            }
    
            $pengunjungItems = $itemQuery->orderByDesc('jumlah_pengunjung')->get();
    
            $pdf = Pdf::loadView('admin.pages.statistik.pdf-files.pdf-items', compact('pengunjungItems', 'year', 'kategori'))
                ->setPaper('a4', 'portrait');
            return $pdf->download("Laporan-Item-Tahun-$year-Kategori-$kategori.pdf");
        }
    
        return back();
    }    
}
