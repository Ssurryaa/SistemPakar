<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Gejala;
use App\Models\TempDiagnosa;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use App\Models\GejalaPenyakit;
use App\Models\GejalaPasien;
use App\Models\Category;
use Session;


class RecomendationController extends Controller
{
    // public function topic(){
    //     session()->flush();
    //     $topic = Topic::all();
    //     return view('recomendation.topic' , ["topics"=> $topic]);
    // }

    // public function index(Topic $topic){
    //     session(['recomendation_list'=>$topic->pekerjaans->sortBy('label')]);
    //     return $this->pertanyaan();

    // }

    public function index(){
        $pekerjaans = Penyakit::all();
        session(['recomendation_list'=>$pekerjaans]);
        return $this->pertanyaan();
    }

    public function yesAnswer(Request $request){
        $yesLabel = session('yes');
        $yesLabel = $yesLabel.$request->karakteristik_code;
        session(['yes'=>$yesLabel]);
        $pekerjaans = session('recomendation_list');
        $pekerjaans = $pekerjaans->filter(function ($pekerjaan) use ($yesLabel){
            return stristr($pekerjaan, $yesLabel) ? true : false;
        });
        session(['recomendation_list'=>$pekerjaans]);
        return $this->pertanyaan();
        
    }

    public function noAnswer(Request $request){
        $noLabel = $request->karakteristik_code;
        $pekerjaans = session('recomendation_list');
        $pekerjaans = $pekerjaans->filter(function ($pekerjaan) use ($noLabel){
            return stristr($pekerjaan, $noLabel) ? false : true;
        });
        session(['recomendation_list'=>$pekerjaans]);
        return $this->pertanyaan();
       
    }

    public function done(){
        session()->flush();
        return redirect('/');
    }

    private function pertanyaan(){
        $codeQuestion = $this->getQuestion();
        
        $pertanyaan = Gejala::where('code',$codeQuestion)->first();
        return view('konsultasi_gejala',['pertanyaan'=>$pertanyaan]);

    }

    private function result(){
        $pekerjaan = collect(session('pekerjaan'))->reverse();
        $diagnosa = $pekerjaan->map(function($pekerjaan_id){
            return Penyakit::find($pekerjaan_id);
        })->unique();
     
        return view('diagnosa',['pekerjaans'=>$diagnosa]);

    }

    // fungsi pendukung
    private function getNextCode($pekerjaan){
        $label = str_split($pekerjaan);
        $status = false;
        $code = null;
        for($startIndex = strlen(session('yes')); $startIndex < strlen($pekerjaan) ; $startIndex++){
            if($status && ctype_alpha($label[$startIndex])){
                return $code;
            }
            if(ctype_alpha($label[$startIndex])){
                $status = true;
            }
            $code = $code.$label[$startIndex]; 
        }
        return $code;
        
    }


    private function getQuestion(){
        $codeQuestion = null;
        $pekerjaans = session('recomendation_list');
        foreach($pekerjaans as $pekerjaan){
            if($pekerjaan == session('yes')){
                session()->push('pekerjaan',$pekerjaan->id);
                continue;
            }else{
                $codeQuestion = $this->getNextCode($pekerjaan);
                return $codeQuestion;
            }
        }
        return $codeQuestion;
    }
}
