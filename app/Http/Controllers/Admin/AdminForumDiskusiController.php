<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForumDiskusi;

class AdminForumDiskusiController extends Controller
{
    public function index()
    {
        $data = ForumDiskusi::orderByRaw("
                FIELD(status, 'Diproses', 'Berhasil Dikirim', 'Ditolak')
            ")
            ->orderBy('tanggal', 'desc')
            ->paginate(10); // ganti get() dengan paginate(10)
    
        return view('admin.pages.forum-diskusi.index', [
            'title' => 'Admin Forum Diskusi | Edulantas',
            'data' => $data
        ]);
    }    

    public function update(Request $request, $id)
    {
        $forum = ForumDiskusi::find($id);
    
        if (!$forum) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    
        $action = $request->input('action');
    
        if ($action === 'kirim_jawaban' || $action === 'ubah_jawaban') {
            $balasan = $request->input('balasan_admin');
            if (empty($balasan)) {
                return response()->json(['message' => 'Jawaban tidak boleh kosong'], 422);
            }
            $forum->balasan_admin = $balasan;
            $forum->status = 'Berhasil Dikirim';
        } elseif ($action === 'tolak_pertanyaan') {
            $forum->status = 'Ditolak';
            // Hapus isi balasan_admin jika sebelumnya sudah ada
            $forum->balasan_admin = null;
        } elseif ($action === 'diproses') {
            $forum->status = 'Diproses';
        }
    
        $forum->save();
    
        return response()->json(['message' => 'Data berhasil diperbarui']);
    }
    
}
