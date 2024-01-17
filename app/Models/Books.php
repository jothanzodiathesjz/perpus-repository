<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    use HasUuids;

    protected $keyType = 'string';
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_publikasi',
        'kategori_buku',
        'isbn',
        'ketersediaan',
        'imgfile',
        'deskripsi'
    ];
}
