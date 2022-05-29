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
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Daftar blog</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn btn-dark mt-3" href="/post/create"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($posts->count() > 0)
                  @foreach($posts as $post)
                  <tr>
                    <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{ $post->title }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{ $post->category->name }}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <a href="/post/{{ $post->id }}/edit"
                            class="btn btn-sm btn-info">Edit</a>
                        <form action="/post/{{ $post->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delate</button>
                        </form>
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