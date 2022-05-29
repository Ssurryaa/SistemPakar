<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyakit;
use App\Models\Pasien;

class TempDiagnosa extends Model
{
    use HasFactory;
    protected $table = 'temp_diagnosas';

    protected $fillable = ['pasien_id', 'penyakit_id', 'gejala', 'gejala_terpenuhi', 'persen'];

    public function penyakit() {
    	return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function pasien() {
    	return $this->belongsTo(Pasien::class);
    }
}
