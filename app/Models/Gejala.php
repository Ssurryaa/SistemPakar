<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'gejala_penyakit', 'gejala_id', 'penyakit_id');
    }

    public function gejalas()
    {
        return $this->belongsToMany(GejalaPasien::class);
    }

    public function details()
    {
        return $this->hasMany(GejalaPenyakit::class, 'gejala_code', 'penyakit_id');
    }

}
