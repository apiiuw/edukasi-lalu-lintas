<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ElectronicsBook;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AdminItemController extends Controller
{
    public function index()
    {
        // Ambil semua buku dan video
        $books = ElectronicsBook::select('id', 'cover', 'judul', 'tahun_rilis')->get();
        $videos = Video::select('id', 'cover', 'judul', 'tahun_rilis')->get();
        $totalBooks = ElectronicsBook::count();
        $totalVideos = Video::count();
        $totalItems = $totalBooks + $totalVideos;
    
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
        return view('admin.pages.item.index', [
            'title' => 'Admin Item | Edulantas',
            'items' => $paginatedItems,
            'totalBooks' => $totalBooks,
            'totalVideos' => $totalVideos,
            'totalItems' => $totalItems
        ]);
    }

    // Fungsi untuk mengedit buku
    public function editBook($id)
    {
        $book = ElectronicsBook::findOrFail($id); // Ambil data buku berdasarkan ID
        return view('admin.pages.item.subpage.edit-books', compact('book') + ['title' => 'Admin Edit Buku | Edulantas']);
    }

    // Fungsi untuk mengedit video
    public function editVideo($id)
    {
        $video = Video::findOrFail($id); // Ambil data video berdasarkan ID
        return view('admin.pages.item.subpage.edit-videos', compact('video')+ ['title' => 'Admin Edit Video | Edulantas']); // Kirim data ke view
    }

    public function updateBook(Request $request, $id)
    {
        $book = ElectronicsBook::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'required|string',
            'kata_kunci' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $words = explode(',', $value); // Pisahkan kata kunci dengan koma
                    if (count($words) < 3) {
                        $fail('Kata kunci minimal harus berisi 3 kata kunci yang dipisahkan dengan koma.');
                    }
                }
            ],
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'pdf' => 'required|mimes:pdf|max:153600',
        ]);
    
        $coverPath = $request->file('cover')->store('data/books/covers', 'public');
        $pdfPath = $request->file('pdf')->store('data/books/pdfs', 'public');

        $book->update([
            'judul' => $request->judul,
            'tahun_rilis' => $request->tahun_rilis,
            'deskripsi' => $request->deskripsi,
            'kata_kunci' => $request->kata_kunci,
            'cover' => $coverPath,
            'pdf' => $pdfPath,
        ]);

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);

    }

    public function updateVideo(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'required|string',
            'kata_kunci' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $words = explode(',', $value);
                    if (count($words) < 3) {
                        $fail('Kata kunci minimal harus berisi 3 kata kunci yang dipisahkan dengan koma.');
                    }
                }
            ],
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'youtube_url' => 'required|url',
        ]);

        // Simpan cover ke storage
        $coverPath = $request->file('cover')->store('data/videos/covers', 'public');

        // Konversi URL YouTube ke format embed
        $youtubeUrl = $request->youtube_url;
        $videoId = $this->extractVideoId($youtubeUrl);
        $iframeUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;

        $video->update([
            'judul' => $request->judul,
            'tahun_rilis' => $request->tahun_rilis,
            'deskripsi' => $request->deskripsi,
            'kata_kunci' => $request->kata_kunci,
            'cover' => $coverPath,
            'youtube_url' => $youtubeUrl,
            'iframe_url' => $iframeUrl,
        ]);

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }

    private function extractVideoId($url)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }

    public function destroyBook($id)
    {
        $book = ElectronicsBook::find($id);
    
        if (!$book) {
            return redirect()->back()->with('error', 'Buku elektronik tidak ditemukan!');
        }
    
        // Hapus cover jika ada
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }
    
        // Hapus PDF jika ada
        if ($book->pdf && Storage::disk('public')->exists($book->pdf)) {
            Storage::disk('public')->delete($book->pdf);
        }
    
        // Hapus dari database
        $book->delete();
    
        return redirect()->back()->with('success', 'Buku elektronik berhasil dihapus!');
    }
    
    public function destroyVideo($id)
    {
        $video = Video::find($id);
    
        if (!$video) {
            return redirect()->back()->with('error', 'Video tidak ditemukan!');
        }
    
        // Hapus cover jika ada
        if ($video->cover && Storage::disk('public')->exists($video->cover)) {
            Storage::disk('public')->delete($video->cover);
        }
    
        // Hapus dari database
        $video->delete();
    
        return redirect()->back()->with('success', 'Video Edukasi berhasil dihapus!');
    }

    public function search(Request $request) {
        $query = $request->input('search');
        $kategori = $request->input('kategori');
        $tahun = $request->input('tahun');
        $totalBooks = ElectronicsBook::count();
        $totalVideos = Video::count();
        $totalItems = $totalBooks + $totalVideos;
        
       // Ambil semua data sesuai filter pencarian (tanpa pagination)
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

        // Gabungkan data buku dan video
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

        // Menghitung total item hasil pencarian secara keseluruhan tanpa menggunakan pagination
        $totalItemSearch = $books->count() + $videos->count();

        return view('admin.pages.item.index', [
            'title' => 'Admin Item | Edulantas',
            'items' => $paginatedItems,
            'totalBooks' => $totalBooks,
            'totalVideos' => $totalVideos,
            'totalItems' => $totalItems,
            'totalItemSearch' => $totalItemSearch
        ]);
    }
}
