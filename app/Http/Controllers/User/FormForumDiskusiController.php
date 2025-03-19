<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ForumDiskusi; // pastikan sudah ada modelnya
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;

class FormForumDiskusiController extends Controller
{
    public function index(Request $request)
    {
        $query = ForumDiskusi::query();
    
        if ($request->has('search') && $request->search != '') {
            $query->where('pertanyaan', 'LIKE', '%' . $request->search . '%');
        }
    
        $data = $query->orderByRaw("
                FIELD(status, 'Berhasil Dikirim', 'Diproses', 'Ditolak')
            ")
            ->orderBy('created_at', 'desc')
            ->get();

        Visitor::create([
            'name'       => auth()->check() ? auth()->user()->name : 'tamu',
            'email'      => auth()->check() ? auth()->user()->email : 'tamu',
            'visit_date' => Carbon::now(),
            'page'       => 'Tanya Admin - Forum Diskusi',
            'item_id'    => null,
            'item_judul' => null,
            'item_kategori' => null,
        ]);
    
        return view('user.pages.forum-diskusi.subpage.form-forum-diskusi', [
            'title' => 'Form Forum Diskusi | Edulantas',
            'data' => $data
        ]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
        ]);

        ForumDiskusi::create([
            'pertanyaan' => $request->pertanyaan,
            'tanggal' => Carbon::now()->format('d/m/Y'),
            'pengirim' => Auth::user()->name,
            'email_pengirim' => Auth::user()->email,
            'status' => 'Diproses',
            'balasan_admin' => null
        ]);

        return redirect()->back()->with('success', 'Pertanyaan berhasil dikirim!');
    }
}
