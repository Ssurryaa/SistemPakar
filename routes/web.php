<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RecomendationController;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')->with('categories', Category::all());
});

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('actionlogin', [AdminController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [AdminController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/basisPengetahuan', [AdminController::class, 'basisPengetahuan'])->name('basisPengetahuan');
    Route::get('/aturan', [AdminController::class, 'aturan'])->name('aturan');
    Route::resource('/gejala', GejalaController::class);
    Route::resource('/penyakit', PenyakitController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/category', CategoryController::class);
});

Route::get('/pasien', [KonsultasiController::class, 'pasienForm'])->name('pasienForm');
Route::post('/storePasien', [KonsultasiController::class, 'storePasien'])->name('storePasien');
Route::post('/diagnosa', [KonsultasiController::class, 'diagnosa'])->name('diagnosa');
Route::get('/{pasien_id}/hasil', [KonsultasiController::class, 'hasilDiagnosa'])->name('hasilDiagnosa');
Route::get('/cetak/{pasien_id}', [KonsultasiController::class, 'cetakDiagnosa'])->name('cetakDiagnosa');

Route::post('/konsultasi',[KonsultasiController::class, 'konsultasi'])->name('konsultasi');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/penyakitMata', [BlogController::class, 'penyakitMata'])->name('penyakitMata');
Route::get('/blog/{id}', [BlogController::class, 'singlePost'])->name('post_single');
Route::get('/{name}', [BlogController::class, 'blogCategory'])->name('category');

Route::post('/kirim', function(){
    $nama=$_POST['nama'];
    $lokasi=$_POST['lokasi'];
    $penyakit=$_POST['penyakit'];
    return redirect ('https://api.whatsapp.com/send?phone=6281123123123/&text=Hallo%2C%20nama%20saya%20'.$nama.'%20berasal%20dari%20'.$lokasi.'.%20Saya%20didiagnosa%20penyakit%20'.$penyakit.'%20dan%20saya%20ingin%20lebih%20tau%20mengenai%20penyakit%20tersebut.');

});
