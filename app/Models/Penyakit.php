<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Gejala;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $fillable = [
        'code','name', 'definisi','penyebab', 'solusi'
    ];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'gejala_penyakit');
    }

    public function details()
    {
        return $this->hasMany(GejalaPenyakit::class, 'gejala_id', 'penyakit_id');
    }

    public function attachGejala($gejala_id) {
        $gejala = Gejala::find($gejala_id);
        return $this->gejala()->attach($gejala);
    }

    public function detachGejala($gejala_id) {
        $gejala = Gejala::find($gejala_id);
        return $this->gejala()->detach($gejala);
    }

}
