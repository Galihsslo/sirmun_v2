<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'jenis_transaksi',
        'order_id',
        'petugas_id',
        'keterangan',
        'jumlah',
        'tanggal_transaksi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
