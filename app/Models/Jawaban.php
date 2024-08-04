<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = "Jawaban";
    protected $fillable = [
        'kode_jawaban', 
        'jawaban', 
        'kode_penyakit',
        'kode_kepribadian', ];
    }
