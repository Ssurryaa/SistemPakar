<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use App\Models\Gejala;
use App\Models\TempDiagnosa;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use App\Models\GejalaPenyakit;
use App\Models\GejalaPasien;
use App\Models\Category;

class KonsultasiController extends Controller
{
    public function pasienForm() {
        $categories = Category::all();
        
    	return view('konsultasi_form_pasien', compact('categories'));
    }

    public function storePasien(Request $request) {
    	$pasien = new Pasien;
    	$pasien->nama = $request->nama;
    	$pasien->lokasi = $request->lokasi;
    	$pasien->save();
    	return $this->selectGejala($pasien->id);
    }

    private function selectGejala($pasien_id) {
    	$gejala = Gejala::where('id', 1)->first();
        $next = 1;
        $categories = Category::all();
        $gejalas = Gejala::all()->count();
    	return view('konsultasi_form_gejala', compact('gejala', 'pasien_id', 'categories', 'gejalas', 'next'));
    }

    public function konsultasi(Request $request){
        $jawaban = $request->jawaban;
        $pasien_id = $request->pasien_id;
        $gejala_id = $request->gejala_id;
        $next = $gejala_id + 1;
        
        $gejala = Gejala::where('id', $next)->first();
        $gejalas = Gejala::all()->count();
        $categories = Category::all();
        
        $gejala_pasien = new GejalaPasien;
        $gejala_pasien->pasien_id = $pasien_id;
        $gejala_pasien->gejala_id = $gejala_id;
        $gejala_pasien->jawaban = $request->jawaban;
        $gejala_pasien->save();

        return view('konsultasi_form_gejala', compact('gejala', 'pasien_id', 'categories', 'gejalas','next'));
        
    }

    public function diagnosa(Request $request) {
        $pasien_id = $request->pasien_id;
        $gejala_pasien = GejalaPasien::where('pasien_id', $pasien_id)->where('jawaban', 'Iya')->get();
        foreach($gejala_pasien as $gejalas){
            $gejala = GejalaPenyakit::where('gejala_id', $gejalas->gejala_id)->get();
            foreach ($gejala as $penyakit) {
                $penyakit_count = GejalaPenyakit::where('penyakit_id', $penyakit->penyakit_id)->get();
                            //dd($penyakit_count);
                $temp_diagnosa = TempDiagnosa::where('pasien_id', $pasien_id)->where('penyakit_id', $penyakit->penyakit_id);
                $temp_diag = $temp_diagnosa->first();
                if (!$temp_diag) {
                    $temp_diag = new TempDiagnosa;
                    $temp_diag->pasien_id = $pasien_id;
                    $temp_diag->penyakit_id = $penyakit->penyakit_id;
                    $temp_diag->gejala = count($penyakit_count);
                    $temp_diag->gejala_terpenuhi = 1;
                    $temp_diag->save();
                } else {
                    $temp_diag = $temp_diagnosa->update(['gejala_terpenuhi' => $temp_diag->gejala_terpenuhi + 1]);
                }
            }  
        }

        $this->hitungPersen($pasien_id);

        return redirect()->route('hasilDiagnosa', $pasien_id);
    }

    private function hitungPersen($pasien_id) {
        $temp_diags = TempDiagnosa::where('pasien_id', $pasien_id)->get();
        foreach ($temp_diags as $temp_diag) {
            $persen = ($temp_diag->gejala_terpenuhi / $temp_diag->gejala) * 100;
            TempDiagnosa::where('penyakit_id', $temp_diag->penyakit_id)
                            ->where('pasien_id', $pasien_id)
                            ->update(['persen' => $persen]);
        }
    }

    public function hasilDiagnosa($pasien_id) {
        $diagnosa = TempDiagnosa::where('pasien_id', $pasien_id)->orderBy('persen', 'DESC')->first();
        $gejalaPasien = GejalaPasien::where('pasien_id', $pasien_id)->where('jawaban', 'Iya')->get();
        $categories = Category::all();
        //dd($gejalaPasien);
        return view('diagnosa', compact('diagnosa', 'gejalaPasien', 'categories'));
    }

    public function cetakDiagnosa($pasien_id) {
        $diagnosa = TempDiagnosa::where('pasien_id', $pasien_id)->orderBy('persen', 'DESC')->first();
        $gejalaPasien = GejalaPasien::where('pasien_id', $pasien_id)->where('jawaban', 'Iya')->get();
        $categories = Category::all();
        //dd($gejalaPasien);
        return view('cetakHasil', compact('diagnosa', 'gejalaPasien', 'categories'));
    }
}
