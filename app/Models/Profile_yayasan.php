<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_yayasan extends Model
{
    use HasFactory;
    protected $table = 'profile_yayasan';

    protected $fillable = [
        'id',
        'nama',
        'description',
        'image',
        'alamat',
        'email',
        'telpon',
    ];

}
