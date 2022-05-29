<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaPasien extends Model
{
    use HasFactory;
    protected $table = 'gejala_pasien';
    protected $fillable = ['pasien_id', 'gejala_code', 'jawaban'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
    
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

}
