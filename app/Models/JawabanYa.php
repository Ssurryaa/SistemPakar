<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanYa extends Model
{
    use HasFactory;
    protected $table = 'jawaban_yas';
    protected $fillable = ['pasien_id', 'gejala_code', 'jawaban'];
}
