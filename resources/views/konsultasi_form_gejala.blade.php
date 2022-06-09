@extends('layouts.template')
@section('content')
<header class="masthead" style="background-image: url('interface/assets/img/Group 349.jpg')">
    <div class="container">
        @if ($next <= $gejalas)
        <p style="color:rgba(255, 255, 255, 0.548)">Jawablah pertanyaan berikut.</p>
        <div class="masthead-subheading">Apakah anda merasakan {{$gejala->name}}?</div>
        <p class="col-md-6">
            <div class="row justify-content-center">
                <div class="col">
                    <form action={{Route('konsultasi')}} method="post">
                        @csrf
                        <input type="hidden" name="jawaban" value="Iya">
                        <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                        <input type="hidden" name="gejala_id" value={{ $gejala->id}}>
                        <button class="btn btn-primary center-block" type="submit">Iya</button>
                    </form>
                </div>
                <div class="col">
                    <form action={{Route('konsultasi')}} method="post">
                        @csrf
                        <input type="hidden" name="jawaban" value="Tidak">
                        <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                        <input type="hidden" name="gejala_id" value={{ $gejala->id}}>
                        <button class="btn btn-primary center-block" type="submit">Tidak</button>
                    </form>
                </div>
            </div>
        </p>
        @else
        <p style="color:rgba(255, 255, 255, 0.548)">Terimakasih telah menjawab pertanyaan tersebut.</p>
        <div class="masthead-subheading">Lihat Hasil Diagnosa Penyakit Mata</div>
        <div class="col">
            <form action={{Route('diagnosa')}} method="post">
                @csrf
                <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                <button class="btn btn-primary btn-xl text-uppercase" type="submit">Hasil Diagnosa</button>
            </form>
        </div>
        @endif
    </div>
</header>
@endsection
