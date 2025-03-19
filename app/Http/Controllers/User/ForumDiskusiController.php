<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForumDiskusi;

class ForumDiskusiController extends Controller
{
    public function index()
    {
        $forumDiskusi = ForumDiskusi::whereNotNull('balasan_admin')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // paginate 10 per page

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
