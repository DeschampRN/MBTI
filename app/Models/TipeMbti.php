<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeMbti extends Model
{
    use HasFactory;
    protected $table = "tipe-mbti";
    protected $fillable = [
        'nama', 
        'deskripsi', 
        'ciri-ciri',
        'kelebihan',
        'kelemahan',
];
}
