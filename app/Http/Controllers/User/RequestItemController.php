<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use Illuminate\Support\Carbon;

class RequestItemController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;        
        $requestItems = RequestItem::where('email_pengirim', $email)
        ->orderByRaw("FIELD(status, 'Berhasil Dikirim', 'Diproses', 'Ditolak')")
        ->orderBy('created_at', 'desc')
        ->get();

        Visitor::create([
            'name'       => auth()->check() ? auth()->user()->name : 'tamu',
            'email'      => auth()->check() ? auth()->user()->email : 'tamu',
            'visit_date' => Carbon::now(),
            'page'       => 'Request Item - Repositori',
            'item_id'    => null,
            'item_judul' => null,
            'item_kategori' => null,
        ]);
        
        return view('user.pages.repositori.subpage.request-item', [
            'title' => 'Request Item | Edulantas',
            'requestItems' => $requestItems
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tahun' => 'nullable|string|max:4',
            'tahun_custom' => 'nullable|string|max:4',
        ]);
    
        // Gunakan tahun custom jika diisi, jika tidak pakai tahun dari radio
        $tahun = $request->tahun_custom ?: $request->tahun;
    
        RequestItem::create([
            'judul' => $request->judul,
            'tahun_rilis' => $tahun,
            'kategori' => $request->kategori,
            'pengirim' => Auth::user()->name, // atau ganti sesuai kolom user
            'email_pengirim' => Auth::user()->email, // atau ganti sesuai kolom user
            'status' => 'Diproses',
        ]);
    
        return redirect()->back()->with('success', 'Request berhasil dikirim!');
    }    
}
