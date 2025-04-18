<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ElectronicsBook;
use App\Models\Video;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Visitor;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $kategori = $request->input('kategori');
        $tahun = $request->input('tahun');
        
        // Ambil data sesuai filter pencarian
        $books = ElectronicsBook::where('judul', 'like', "%$query%")
            ->when($kategori == 'Elektronik Buku', function ($q) {
                return $q;
            })
            ->when($tahun, function ($q) use ($tahun) {
                return $q->where('tahun_rilis', $tahun);
            })
            ->select('id', 'cover', 'judul', 'tahun_rilis')
            ->get();
    
        $videos = Video::where('judul', 'like', "%$query%")
            ->when($kategori == 'Video Edukasi', function ($q) {
                return $q;
            })
            ->when($tahun, function ($q) use ($tahun) {
                return $q->where('tahun_rilis', $tahun);
            })
            ->select('id', 'cover', 'judul', 'tahun_rilis')
            ->get();
    
        // Gabungkan data
        $items = [];
        $max = max(count($books), count($videos));
    
        for ($i = 0; $i < $max; $i++) {
            if (isset($books[$i])) {
                $items[] = ['type' => 'book', 'data' => $books[$i]];
            }
            if (isset($videos[$i])) {
                $items[] = ['type' => 'video', 'data' => $videos[$i]];
            }
        }
    
        // Konversi ke koleksi dan paginasi
        $collection = collect($items);
        $perPage = 12;
        $currentPage = request()->query('page', 1);
        $pagedData = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
    
        $paginatedItems = new LengthAwarePaginator(
            $pagedData,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $totalItemSearch = $books->count() + $videos->count();

        Visitor::create([
            'name'       => auth()->check() ? auth()->user()->name : 'tamu',
            'email'      => auth()->check() ? auth()->user()->email : 'tamu',
            'visit_date' => Carbon::now(),
            'page'       => 'Repositori',
            'item_id'    => null,
            'item_judul' => null,
            'item_kategori' => null,
        ]);
    
        return view('user.pages.repositori.index', [
            'title' => 'Repositori | Edulantas',
            'items' => $paginatedItems,
            'totalItemSearch' => $totalItemSearch
        ]);
    }
}
