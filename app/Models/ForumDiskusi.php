<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumDiskusi extends Model
{
    use HasFactory;
    protected $table = 'forum_diskusi';

    protected $fillable = [
        'pertanyaan',
        'tanggal',
        'pengirim',
        'email_pengirim',
        'status',
        'balasan_admin'
    ];
}
