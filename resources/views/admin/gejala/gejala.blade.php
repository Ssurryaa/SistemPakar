@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        @if (\Session::has('success'))
        <section class="breadcrumb-section pb-2">
            <div class="container">
                <div class="alert alert-success bg-gradient-info">
                        <h6 align="center" style="color:#FFFF;">{!! \Session::get('success') !!}</h6>
                </div>
            </div>
        </section>
        @endif
        @if (\Session::has('error'))
        <section class="breadcrumb-section pb-2">
            <div class="container">
                <div class="alert alert-danger bg-gradient-danger">
                        <h6 align="center" style="color:#FFFF;">{!! \Session::get('error') !!}</h6>
                </div>
            </div>
        </section>
        @endif
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Daftar Gejala Penyakit Mata</h6>
                  </div>
                  <div class="col-6 text-end">
                    <button class="btn btn-dark mt-3" data-toggle="modal" data-target="#modal-add"></i><i class="fa fa-plus" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
                <div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xs">
                    <form name="frm_add" id="frm_add" class="form-horizontal" action="/gejala" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Gejala Penyakit Mata</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <label class="col-lg-5 control-label">Kode</label>
                              <div class="col-lg-12"><input type="text" class="form-control" id="code" name="code" placeholder="Gxx" autofocus value="{{ old('code') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Nama Gejala</label>
                                <div class="col-lg-12"><input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"></div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-5 control-label" for="penyakit">Penyakit</label>
                              @foreach($penyakits as $penyakit)
                                  <div class="checkbox">
                                    <div class="col-lg-12"><input type="checkbox" name="penyakit[]" value="{{ $penyakit->id }}"> {{ $penyakit->name }}</div>
                                  </div>
                              @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Gejala</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if($gejalas->count() > 0)
                    @foreach($gejalas as $gejala)
                  <tr>
                    <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">{{ $gejala->code }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{ $gejala->name }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <button class="badge badge-sm bg-gradient-success" data-toggle="modal" data-target="#modalDetailBarang{{ $gejala->id }}">Detail</button>
                      <!-- Modal Detail Barang-->
                        <div class="modal inmodal fade" id="modalDetailBarang{{ $gejala->id }}" tabindex="-1" aria-labelledby="modalDetailBarang" aria-hidden="true">
                            <div class="modal-dialog modal-xs">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Gejala Penyakit Mata</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                          <p class="ml-3" align="left">Kode</p>
                                          <div class="col-lg-12"><input type="text" class="form-control" id="code" name="code" readonly value="{{ $gejala->code}}"></div>
                                        </div>
                                        <div class="form-group">
                                            <p class="ml-3" align="left">Nama Gejala</p>
                                            <div class="col-lg-12"><input type="text" class="form-control" id="name" name="name" readonly value="{{ $gejala->name}}"></div>
                                        </div>
                                        <div class="form-group">
                                          <p class="ml-3" align="left">Penyakit</p>
                                          @foreach($penyakits as $penyakit)
                                              <div class="checkbox">
                                                <div class="col-lg-2 ml-1"><input type="checkbox" name="penyakit[]" value="{{ $penyakit->id }}" disabled
                                                  @foreach($gejala->penyakits as $t)
                                                      @if($penyakit->id == $t->id)
                                                          checked
                                                      @endif
                                                  @endforeach> 
                                                   {{ $penyakit->name }}
                                                </div>
                                              </div>
                                          @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <button class="badge badge-sm bg-gradient-secondary" data-toggle="modal" data-target="#modalUpdateBarang{{ $gejala->id }}">Edit</button>
                      <!-- Modal Update Barang-->
                        <div class="modal inmodal fade" id="modalUpdateBarang{{ $gejala->id }}" tabindex="-1" aria-labelledby="modalUpdateBarang" aria-hidden="true">
                            <div class="modal-dialog modal-xs">
                                <form action="/gejala/{{ $gejala->id }}" method="post">
                                @method('put')
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Gejala Penyakit Mata</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                          <p class="ml-3" align="left">Kode</p>
                                          <div class="col-lg-12"><input type="text" class="form-control" id="code" name="code" autofocus value="{{ $gejala->code}}"></div>
                                        </div>
                                        <div class="form-group">
                                            <p class="ml-3" align="left">Nama Gejala</p>
                                            <div class="col-lg-12"><input type="text" class="form-control" id="name" name="name" value="{{ $gejala->name}}"></div>
                                        </div>
                                        <div class="form-group">
                                          <p class="ml-3" align="left">Penyakit</p>
                                          @foreach($penyakits as $penyakit)
                                              <div class="checkbox">
                                                <div class="col-lg-2 ml-1"><input type="checkbox" name="penyakit[]" value="{{ $penyakit->id }}"
                                                  @foreach($gejala->penyakits as $t)
                                                      @if($penyakit->id == $t->id)
                                                          checked
                                                      @endif
                                                  @endforeach
                                                  > {{ $penyakit->name }}</label>
                                                </div>
                                              </div>
                                          @endforeach
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                      <button class="badge badge-sm bg-gradient-danger" data-toggle="modal" data-target="#modalHapusBarang{{ $gejala->id }}">Delete</button>
                      <div class="modal fade" id="modalHapusBarang{{ $gejala->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
                        <div class="modal-dialog modal-xs">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title">Hapus data: <span>{{ $gejala->name}}? </span></h5>
                                </div>
                                <div class="modal-footer">
                                <form action="/gejala/{{ $gejala->id }}" method="post">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                </form>
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  @else
                    <tr>
                        <th colspan="5" class="text-center">Tidak ada data gejala</th>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{ $gejalas->links() }}
  </div>
  @endsection