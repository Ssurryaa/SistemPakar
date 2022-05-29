<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gejala;
use App\Models\Diagnosa;

class Pasien extends Model
{
    use HasFactory;

    public function gejala() {
    	return $this->belongsToMany(Gejala::class);
    }

    public function diagnosa() {
    	return $this->hasMany(Diagnosa::class);
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
