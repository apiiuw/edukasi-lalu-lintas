<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForumDiskusi;
use App\Models\Visitor;
use Illuminate\Support\Carbon;

class ForumDiskusiController extends Controller
{
    public function index()
    {
        $forumDiskusi = ForumDiskusi::whereNotNull('balasan_admin')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // paginate 10 per page

        Visitor::create([
            'name'       => auth()->check() ? auth()->user()->name : 'tamu',
            'email'      => auth()->check() ? auth()->user()->email : 'tamu',
            'visit_date' => Carbon::now(),
            'page'       => 'Forum Diskusi',
            'item_id'    => null,
            'item_judul' => null,
            'item_kategori' => null,
        ]);

        return view('user.pages.forum-diskusi.index', [
            'title' => 'Forum Diskusi | Edulantas',
            'forumDiskusi' => $forumDiskusi
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $forumDiskusi = ForumDiskusi::whereNotNull('balasan_admin')
            ->where('pertanyaan', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();
    
        session()->flash('success', 'Pencarian berhasil!');
    
        return view('user.pages.forum-diskusi.index', [
            'title' => 'Forum Diskusi | Edulantas',
            'forumDiskusi' => $forumDiskusi
        ]);
    }
}