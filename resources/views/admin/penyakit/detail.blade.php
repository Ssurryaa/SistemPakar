@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="card-header pb-0 p-3">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tambah Data Penyakit Mata</h6>
                </div>
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="name">Kode</label>
                        <input readonly type="text" name="code" class="form-control" value="{{$penyakit->code}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Penyakit</label>
                        <input readonly type="text" name="name" class="form-control" value="{{$penyakit->name}}">
                    </div>
                    <div class="form-group">
                        <label for="definisi">Definisi</label>
                        <textarea readonly name="definisi" cols="5" rows="5" id="definisi" cols="30" rows="10" class="form-control">{!!$penyakit->definisi!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="penyebab">Penyebab</label>
                        <textarea readonly name="penyebab" cols="5" rows="5" id="penyebab" cols="30" rows="10" class="form-control">{!!$penyakit->penyebab!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="solusi">Solusi</label>
                        <textarea readonly name="solusi" cols="5" rows="5" id="solusi" cols="30" rows="10" class="form-control">{!!$penyakit->solusi!!}</textarea>
                    </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection