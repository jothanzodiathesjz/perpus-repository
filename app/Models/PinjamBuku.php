<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class PinjamBuku extends Model
{
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $fillable = [
        'id_buku',
        'id_user',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'nama_lengkap',
        'expired_date',
    ];
}
