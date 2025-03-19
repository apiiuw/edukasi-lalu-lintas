<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ElectronicsBook;
use App\Models\Video;
use App\Models\Visitor;
use Carbon\Carbon;

class DetailItemController extends Controller
{
    public function showByTypeId($type_id)
    {
        // Pisahkan prefix dan ID (contoh: "book-1" jadi ["book", "1"])
        [$type, $id] = explode('-', $type_id);

        if ($type === 'book') {
            $item = DB::table('electronics_books')->where('id', $id)->first();
        } elseif ($type === 'video') {
            $item = DB::table('videos')->where('id', $id)->first();
        } else {
            abort(404);
        }

        if (!$item) {
            abort(404);
        }

        Visitor::create([
            'name'           => auth()->check() ? auth()->user()->name : 'tamu',
            'email'          => auth()->check() ? auth()->user()->email : 'tamu',
            'visit_date'     => Carbon::now(),
            'page'           => 'Detail Item',
            'item_id'        => $item->id ?? null,
            'item_judul'     => $item->judul ?? $item->title ?? '-',
            'item_kategori'  => $type,
        ]);

        return view('user.pages.repositori.subpage.detail-item', [
            'title' => 'Detail Item | Edulantas',
            'item' => $item,
            'type' => $type
        ]);
    }
}
