@extends('layouts.template')
@section('title', $post->title)
@section('content')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url({{asset($post->featured)}})"> 
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <div class="masthead-subheading">{{ $post->title }}</div>
                            <span class="meta">
                                Published {{ $post->created_at->toFormattedDateString() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4 mt-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-9">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            </div>
        </article>
@endsection
