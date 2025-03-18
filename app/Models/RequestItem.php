<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'kategori', 'pengirim', 'email_pengirim', 'status', 'tahun_rilis'];
}
