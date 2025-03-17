<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ElectronicsBook;
use App\Models\Video;

class DetailItemController extends Controller
{
    public function show($type, $id)
    {
        if ($type === 'book') {
            $item = ElectronicsBook::findOrFail($id);
        } elseif ($type === 'video') {
            $item = Video::findOrFail($id);
        } else {
            abort(404);
        }

        return view('user.pages.repositori.detail-item', [
            'title' => 'Detail Item | Edulantas',
            'item' => $item,
            'type' => $type
        ]);
    }
}
