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
                  <h6 class="mb-0">Daftar Penyakit Mata</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn btn-dark mt-3" href="/penyakit/create"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Penyakit</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Definisi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penyebab</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cara Mengatasi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($penyakits->count() > 0)
                  @foreach($penyakits as $penyakit)
                  <tr>
                    <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">{{ $penyakit->code }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{ $penyakit->name }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{!!  Str::words($penyakit->definisi, 1) !!}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{!!  Str::words($penyakit->penyebab, 1) !!}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{!! Str::words($penyakit->solusi, 1) !!}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <a class="badge badge-sm bg-gradient-primary" href="/penyakit/{{ $penyakit->id }}">Detail</a>
                      <a class="badge badge-sm bg-gradient-secondary" href="/penyakit/{{ $penyakit->id }}/edit">Edit</a>
                      <button class="badge badge-sm bg-gradient-danger" data-toggle="modal" data-target="#modalHapusBarang{{ $penyakit->id }}">Delete</button>
                      <div class="modal fade" id="modalHapusBarang{{ $penyakit->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
                        <div class="modal-dialog modal-xs">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title">Hapus data: <span>{{ $penyakit->name}}? </span></h5>
                                </div>
                                <div class="modal-footer">
                                <form action="/penyakit/{{ $penyakit->id }}" method="post">
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
                        <th colspan="5" class="text-center">Tidak ada data penyakit</th>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection