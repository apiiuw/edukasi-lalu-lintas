<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tahun_rilis',
        'deskripsi',
        'kata_kunci',
        'cover',
        'youtube_url',
        'iframe_url',
    ];
}
