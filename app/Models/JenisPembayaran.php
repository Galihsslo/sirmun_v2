<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;
    protected $table = 'jenis_pembayaran';
    protected $fillable = [
        'id',
        'nama',
        'status',
        'periode',
        'keterangan',
        'jumlah',
    ];

    public function jenisPembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_jenis');
    }
}
