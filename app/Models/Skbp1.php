<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skbp1 extends Model
{
    use HasFactory;
    protected $fillable = [
         'id_user',
         'nama', 
         'stambuk', 
         'fakultas', 
         'jurusan', 
         'judul', 
         'abstrak', 
         'turnitin',
         'bab1',
         'bab2', 
         'bab3', 
         'bab4', 
         'fulltext', 
         'conclusion', 
         'reference', 
         'sampul', 
         'alamat', 
         'type', 
         'volume', 
         'show',
         'tahun'
    ];

    // Jika Anda menggunakan UUID sebagai primary key
    protected $keyType = 'string';
}
