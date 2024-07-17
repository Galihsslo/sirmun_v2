<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = [
        'id',
        'title',
        'content',
        'image',
        'created_at',
        'updated_at',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
