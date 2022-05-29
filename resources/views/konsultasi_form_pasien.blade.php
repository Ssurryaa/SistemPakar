@extends('layouts.template')
@section('content')
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading" style="color:rgba(255, 255, 255, 0.548)">Diagnosa Penyakit Mata</div>
        <div class="masthead-heading">Silahkan Isi Data Diri Anda</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#services">Selanjutnya!</a>
    </div>
</header>
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Form Data Pasien</h2>
            <h3 class="section-subheading text-muted">Diagnosa Penyakit Mata.</h3>
        </div>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-9">
                        <form method="POST" action="{{ route('storePasien') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Nama :</label>
                                        <input type="text" name="nama" class="form-control" required="required" placeholder="Nama pasien">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Alamat :</label>
                                        <textarea class="form-control" name="lokasi" required="required" placeholder="Alamat pasien"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <p><button type="submit" class="btn btn-primary pull-right">Mulai Konsultasi <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i></button></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <div class="clearfix" style="margin-bottom: 20px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
