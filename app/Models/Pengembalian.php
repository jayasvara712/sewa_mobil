<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';

    protected $fillable = [
        'id_pengembalian', 'id_user', 'id_mobil', 'tgl_pengembalian', 'total_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil', 'id_mobil');
    }
}
