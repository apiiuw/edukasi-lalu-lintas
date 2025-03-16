<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectronicsBook extends Model
{
    use HasFactory;

    protected $table = 'electronics_books'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'judul',
        'tahun_rilis',
        'deskripsi',
        'kata_kunci',
        'cover',
        'pdf',
    ];
}
