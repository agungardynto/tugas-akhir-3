@extends('static.app')
@section('css')
<link rel="stylesheet" href="{{ asset('sona/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom-style-pagination.css') }}" type="text/css">
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
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Blog & Event</h2>
                    <ol class="breadcrumb bg-transparent justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog & Event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            @foreach ($blog as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ Storage::url($item->thumbnail) }}">
                    <div class="bi-text">
                        @foreach ($item->tag as $tags)
                        <span class="b-tag" style="background-color: rgb(255, 73, 182)">{{ $tags->tag }}</span>
                        @endforeach
                        <h4><a href="{{ route('detail_blog', $item->slug) }}">{{ $item->title }}</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> {{ date('l, d F Y', strtotime($item->created_at)) }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                {{ $blog->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
