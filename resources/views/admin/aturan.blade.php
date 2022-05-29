@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-3">Aturan</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rule</th>
                  </tr>
                </thead>
                <tbody>
                  @if($penyakit->count() > 0)
                  @foreach($penyakit as $penyakits)
                  <tr>
                    <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">R{{ $loop->iteration }}</h6>
                    </td>
                    <td class="align-middle text-sm">
                      <h6 class="mb-0 text-sm">Jika</h6>
                    @foreach($gejala_penyakit as $gejala_penyakits)
                        @if ($gejala_penyakits->penyakit_id == $penyakits->id)  
                            <p class="mb-0 text-sm ml-3">-{{ $gejala_penyakits->gejala->name }},</p>
                        @endif
                    @endforeach
                      <h6 class="mb-0 text-sm mt-2">Maka {{ $penyakits->name }}</h6>
                    </td>
                  </tr>
                  @endforeach
                  @else
                    <tr>
                        <th colspan="5" class="text-center">Tidak ada data basis pengetahuan</th>
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