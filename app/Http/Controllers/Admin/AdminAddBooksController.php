<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ElectronicsBook;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminAddBooksController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
    
        // Jika validasi gagal, kembalikan respons JSON dengan error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }
    
        DB::beginTransaction();
    
        try {
            $coverPath = $request->file('cover')->store('data/books/covers', 'public');
            $pdfPath = $request->file('pdf')->store('data/books/pdfs', 'public');
    
            ElectronicsBook::create([
                'judul' => $request->judul,
                'tahun_rilis' => $request->tahun_rilis,
                'deskripsi' => $request->deskripsi,
                'kata_kunci' => $request->kata_kunci,
                'cover' => $coverPath,
                'pdf' => $pdfPath,
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Hapus file jika gagal menyimpan ke database
            if (isset($coverPath)) Storage::disk('public')->delete($coverPath);
            if (isset($pdfPath)) Storage::disk('public')->delete($pdfPath);
    
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
}
