<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProfileImg extends Model
{
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string';
    protected $fillable = [
        'id_user',
        'img',
    ];

}
