<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Sumbangan extends Model
{
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    // fillable
     protected $fillable = [
        'id_profile',
        'fullname',
        'id_buku',
        'kategori',
        'jumlah',
     ];
}
