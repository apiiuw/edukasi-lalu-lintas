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
            'items' => $paginatedItems
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

}
