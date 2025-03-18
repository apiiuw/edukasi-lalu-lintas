<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestItem;
use Illuminate\Http\Request;

class AdminRequestItemController extends Controller
{
    public function index()
    {
        $requestItems = RequestItem::query()
            ->orderByRaw("FIELD(status, 'Diproses', 'Berhasil Dikirim', 'Ditolak')")
            ->orderBy('created_at', 'desc')
            ->paginate(10); // <- gunakan paginate di sini!
    
        return view('admin.pages.request-item.index', [
            'title' => 'Admin Request Item | Edulantas',
            'requestItems' => $requestItems
        ]);
    }    

    // Menampilkan halaman edit request item
    public function edit($id)
    {
        $item = RequestItem::findOrFail($id);
        return view('admin.pages.request-item.edit', [
            'title' => 'Edit Request Item | Edulantas',
            'item' => $item
        ]);
    }

    // Update status request item
    public function update(Request $request, $id)
    {
        $request->validate(['status' => 'required|string']);
    
        $item = RequestItem::findOrFail($id);
        $item->status = $request->status;
        $item->save();
    
        return response()->json(['success' => true]);
    }    
}
