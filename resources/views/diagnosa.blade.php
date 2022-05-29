@extends('layouts.template')
@section('content')
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading" style="color:rgba(255, 255, 255, 0.548)">Diagnosa Penyakit Mata</div>
        <div class="masthead-heading">Lihat Hasil Diagnosa</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#services">Lihat Hasil</a>
    </div>
</header>
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Hasil Diagnosa</h2>
            <h3 class="section-subheading text-muted">Hasil didapat berdasarkan gejala-gejala yang dirasakan</h3>
        </div>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-12 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <h6><strong>Data Diagnosa :</strong></h6>
                            </div>
                            <div class="col-md-12 ml-2">
                                <table class="table" rules="none">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td class="col-md-10">{{ $diagnosa->pasien->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td class="col-md-10">{{ $diagnosa->pasien->lokasi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td class="col-md-10">{{ $diagnosa->created_at->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <h6><strong>Gejala-gejala yang dirasakan :</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-12 ml-2">
                            <ol>
                            @foreach ($gejalaPasien as $gejala)
                                <li> {{ $gejala->gejala->name }}</li>
                            @endforeach
                            </ol>
                        </div>
                        <div class="col-md-12">
                            <hr>    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <h6><strong>Hasil Diagnosa :</strong></h6>
                            </div>
                            <div class="col-md-12 ml-2">
                                <p><strong>Anda kemungkinan besar terkena penyakit {{ $diagnosa->penyakit->name }}.</strong></p>
                                <table class="table" rules="none">
                                    <!--<tr>
                                        <td>Persentase</td>
                                        <td>:</td>
                                        <td class="col-md-10">{{ $diagnosa->persen }}%</td>
                                    </tr>-->
                                    <tr>
                                        <td>Definisi</td>
                                        <td>:</td>
                                        <td class="col-md-10">{!! $diagnosa->penyakit->definisi !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Penyebab</td>
                                        <td>:</td>
                                        <td class="col-md-10">{!! $diagnosa->penyakit->penyebab !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Solusi</td>
                                        <td>:</td>
                                        <td class="col-md-10">{!! $diagnosa->penyakit->solusi !!}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <form action="/kirim" method="post">
                                        @csrf
                                        <input type="hidden" name="nama" id="nama" value="{{ $diagnosa->pasien->nama }}">
                                        <input type="hidden" name="lokasi" id="lokasi" value="{{ $diagnosa->pasien->lokasi }}">
                                        <input type="hidden" name="penyakit" id="penyakit" value="{{ $diagnosa->penyakit->name }}">
                                        <button type="submit" class="btn btn-primary pull-right">Tanya Dokter <i class="fa-solid fa-user-doctor"></i></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <p>
                                        <a href="{{ route('cetakDiagnosa', $diagnosa->pasien_id) }}" class="btn btn-outline-primary"  target="_blank">Cetak Hasil <i class="fa-solid fa-print"></i></a>
                                    </p>
                                </div>
                                <div class="col">
                                    <p>
                                        <a href="{{ url('/') }}" class="btn btn-outline-primary">Selesai <i class="fa fa-fw fa-sign-out"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
