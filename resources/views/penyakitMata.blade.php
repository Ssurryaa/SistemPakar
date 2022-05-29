@extends('layouts.template')
@section('content')
<header class="masthead" style="background-image: url('interface/assets/img/Group 19.jpg')">
    <div class="container">
        <div class="masthead-subheading" style="color:rgba(255, 255, 255, 0.548)">Diagnosa Penyakit Mata</div>
        <div class="masthead-heading text-uppercase">Daftar Penyakit</div>
    </div>
</header>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            @foreach($penyakits as $penyakit)
            <h2 class="section-heading text-uppercase">{{ $penyakit->name }}</h2>
            <h3 class="section-subheading text-muted">------------</h3>
            @endforeach
        </div>
    </div>
</section>
@endsection