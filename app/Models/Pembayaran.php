<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'id',
        'nama',
        'petugas',
        'jenis_pembayaran',
        'is_expense',
        'nominal',
        'date',
        'status',
    ];


    public function getIsExpenseAttribute($value)
    {
        return $value === 'N' ? 'Pendapatan' : 'Pengeluaran';
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'petugas');
    }
    public function jenisPembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_jenis');
    }
}
