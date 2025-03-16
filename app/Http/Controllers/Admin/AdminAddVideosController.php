<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminAddVideosController extends Controller
{
    public function store(Request $request)
    {
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
    
        DB::beginTransaction();
    
        try {
            // Simpan cover ke storage
            $coverPath = $request->file('cover')->store('data/videos/covers', 'public');
    
            // Konversi URL YouTube ke format embed
            $youtubeUrl = $request->youtube_url;
            $videoId = $this->extractVideoId($youtubeUrl);
            $iframeUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    
            // Simpan data ke database
            Video::create([
                'judul' => $request->judul,
                'tahun_rilis' => $request->tahun_rilis,
                'deskripsi' => $request->deskripsi,
                'kata_kunci' => $request->kata_kunci,
                'cover' => $coverPath,
                'youtube_url' => $youtubeUrl,
                'iframe_url' => $iframeUrl,
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Video Edukasi berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Hapus file jika gagal menyimpan ke database
            if (isset($coverPath)) {
                Storage::disk('public')->delete($coverPath);
            }
    
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Ekstrak ID video dari URL YouTube
     */
    private function extractVideoId($url)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }
    

}
