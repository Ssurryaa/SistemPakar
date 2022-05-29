<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Diagnosa;
use App\Models\GejalaPenyakit;
use App\Models\Post;
use App\Models\Category;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    public function actionlogin(){
        $credentials = request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)){
            return redirect('/admin');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function index()
    {
        return view('admin.dashboard')
                ->with('gejala_count', Gejala::all()->count())
                ->with('penyakit_count', Penyakit::all()->count())
                ->with('diagnosa_count', Pasien::all()->count())
                ->with('post_count', Post::all()->count())
                ->with('kategori_count', Category::all()->count())
                ->with('pengetahuan_count', GejalaPenyakit::all()->count());
    }

    public function basisPengetahuan()
    {
        $gejala_penyakit = GejalaPenyakit::orderBy('penyakit_id', 'ASC')->get();

        return view('admin.basisPengetahuan', compact('gejala_penyakit'));
    }

    public function aturan()
    {
        $penyakit = Penyakit::all();
        $gejala_penyakit = GejalaPenyakit::all();

        return view('admin.aturan', compact('gejala_penyakit', 'penyakit'));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }else{
            return view('admin.login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
