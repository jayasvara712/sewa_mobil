<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_peminjaman', 'id_user', 'id_mobil', 'tgl_mulai_peminjaman', 'tgl_selesai_peminjaman'
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
