@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-3 mb-3">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Penyakit</p>
                  <h5 class="font-weight-bolder">
                    {{ $penyakit_count }}
                  </h5>
                </div>
              </div>
              <div class="col-4 mt-3 mb-3 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-atom text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-3 mb-3">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Gejala</p>
                  <h5 class="font-weight-bolder">
                    {{ $gejala_count }}
                  </h5>
                </div>
              </div>
              <div class="col-4 mt-3 mb-3 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-single-copy-04 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-3 mb-3">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengetahuan</p>
                  <h5 class="font-weight-bolder">
                    {{ $pengetahuan_count }}
                  </h5>
                </div>
              </div>
              <div class="col-4 mt-3 mb-3 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-3 mb-3">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                  <h5 class="font-weight-bolder">
                    {{ $diagnosa_count }}
                  </h5>
                </div>
              </div>
              <div class="col-4 mt-3 mb-3 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-3">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-3 mb-3">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Artikel</p>
                  <h5 class="font-weight-bolder">
                    {{ $post_count }}
                  </h5>
                </div>
              </div>
              <div class="col-4 mt-3 mb-3 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-3">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-3 mb-3">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Kategori Artikel</p>
                  <h5 class="font-weight-bolder">
                    {{ $kategori_count }}
                  </h5>
                </div>
              </div>
              <div class="col-4 mt-3 mb-3 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection