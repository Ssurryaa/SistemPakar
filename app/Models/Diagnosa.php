<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyakit;
use App\Models\Pasien;

class Diagnosa extends Model
{
    use HasFactory;
    
    protected $fillable = ['pasien_id', 'penyakit_id', 'persentase'];

    public function penyakit() {
    	return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function pasien() {
    	return $this->belongsTo(Pasien::class);
    }
}
