<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ElectronicsBook;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class RepositoriController extends Controller
{
    public function index()
    {
        // Ambil semua buku dan video
        $books = ElectronicsBook::select('id', 'cover', 'judul', 'tahun_rilis')->get();
        $videos = Video::select('id', 'cover', 'judul', 'tahun_rilis')->get();
    
        // Gabungkan data secara selang-seling
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
    
        // Konversi array menjadi koleksi
        $collection = collect($items);
    
        // Pagination manual
        $perPage = 12;
        $currentPage = request()->query('page', 1);
        $pagedData = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
    
        // Buat instance paginator
        $paginatedItems = new LengthAwarePaginator(
            $pagedData,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    
        // Kirim data ke view
        return view('user.pages.repositori.index', [
            'title' => 'Repositori | Edulantas',
            'items' => $paginatedItems
        ]);
    }
}
