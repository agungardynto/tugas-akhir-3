@extends('static.app')
@section('css')
<link rel="stylesheet" href="{{ asset('sona/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/style.css') }}" type="text/css">
    <style>
        .bd-title h4 {
            margin: 20px 0;
        }
    </style>
@endsection
@section('js')
<script src="{{ asset('sona/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('sona/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('sona/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('sona/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('sona/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('sona/js/main.js') }}"></script>
@endsection
@section('content')
<section class="blog-details-hero set-bg" data-setbg="{{ Storage::url($blog->thumbnail) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="bd-hero-text">
                    @foreach ($blog->tag as $headTags)
                    <span style="background-color: rgb(255, 73, 182)">{{ $headTags->tag }}</span>
                    @endforeach
                    <h2>{{ $blog->title }}</h2>
                    <ul>
                        <li class="b-time" style="color: rgb(255, 73, 182)"><i class="icon_clock_alt"></i> {{ date('l, d F Y', strtotime($blog->created_at)) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog-details-text">
                    <div class="bd-title">
                        <img src="{{ Storage::url($blog->image_post) }}" alt="post-image" class="img-fluid mb-3" style="max-height: 500px; width: 100%; object-fit: cover; object-position: 100% 80%">
                        {!! $blog->post !!}
                    </div>
                    <div class="tag-share">
                        <div class="tags">
                            <span class="px-3 py-1 text-white text-uppercase" style="background-color: rgb(255, 73, 182)"><i class="fa fa-eye mr-2" aria-hidden="true"></i>{{ $blog->view }}</span>
                            @foreach ($blog->tag as $footTags)
                            <span class="px-3 py-1 bg-primary text-white text-uppercase">{{ $footTags->tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="recommend-blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Recommended</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-1.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="#">Tremblant In Canada</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-2.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="#">Choosing A Static Caravan</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-3.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="#">Copper Canyon</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection