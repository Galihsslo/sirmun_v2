<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Transaksi;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $fillable = [
        'nama',
        'email',
        'role',
        'foto',
        'telpon',
        'password',
        'alamat'
    ];
    public function artikel()
    {
        return $this->hasMany(artikel::class, 'author_id');
    }
    public function berita()
    {
        return $this->hasMany(Berita::class, 'berita');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'petugas_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Transaksi::class, 'petugas');
    }




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
