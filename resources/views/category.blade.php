@extends('layouts.template')
@section('content')
<header class="masthead" style="background-image: url('interface/assets/img/header-bg1.jpg')">
    <div class="container">
        <div class="masthead-subheading">Blog</div>
        <div class="masthead-heading text-uppercase">{{ $category->name }}</div>
    </div>
</header>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Artikel Terbaru</h2>
            <h3 class="section-subheading text-muted">------------</h3>
        </div>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{ Route('post_single', $post->id) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                        </a>
                        <p class="post-meta">
                            Published {{ $post->created_at->toFormattedDateString() }}
                        </p>
                        <h6 align="right"><a class="more-link" href="{{ Route('post_single', $post->id) }}">Read more &rarr;</a></h6>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection