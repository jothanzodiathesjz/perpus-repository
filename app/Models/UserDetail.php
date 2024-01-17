<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class UserDetail extends Model
{
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'username',
        'fullname',
        'stambuk',
        'fakultas',
        'ProgramStudi',
        'alamat',
        'telepon'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
