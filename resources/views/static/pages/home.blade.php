@extends('static.app')
@section('js')
<script>
    document.getElementById('blog-4').classList.remove('col-xl-4', 'col-lg-4')
    document.getElementById('blog-4').classList.add('col-xl-8', 'col-lg-8')
</script>
@endsection
@section('content')
<div id="indicators" class="carousel slide carousel-fade position-relative" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#indicators" data-slide-to="0" class="active"></li>
        <li data-target="#indicators" data-slide-to="1"></li>
        <li data-target="#indicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item bg-book active"></div>
        <div class="carousel-item bg-book"></div>
        <div class="carousel-item bg-book"></div>
    </div>
    <div class="tagline">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <h1 class="text-capitalize">{{ env('APP_NAME') }} a luxury hotel</h1>
                    <p class="mb-5">Here are the best hotel booking sites, including recommendations for
                        international
                        travel and for
                        finding low-priced hotel rooms.</p>
                    <a href="{{ url('rooms') }}" class="text-uppercase">discover now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="our-hotel" style="margin-top: 50px; margin-bottom: 50px">
    <div class="container">
        <div class="row">
            <div class="col-12 res-company">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" style="background-color: hotpink; color: white; border-color: hotpink">Find our hotel in your area</span>
                    </div>
                    <input type="text" name="src" id="src-company" class="form-control" placeholder="Recipient's City" autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about" class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2 text-center">
                <h6 class="text-uppercase mb-3">about us</h6>
                <h3>Intercontinental LA Westlake Hotel</h3>
                <p>Sona.com is a leading online accommodation site. We’re passionate about travel. Every day, we
                    inspire
                    and reach millions of travelers across 90 local websites in 41 languages.</p>
                <p class="mb-5">So when it comes to booking the perfect hotel, vacation rental, resort, apartment,
                    guest
                    house, or
                    tree house, we’ve got you covered.</p>
                <a href="#" class="text-uppercase">read more</a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-5">
                        <div class="about-img">
                            <img src="{{ asset('img/static/about/fikri-rasyid-UuqoZuqRsOA-unsplash.jpg') }}" class="to-top">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-3">
                        <div class="about-img">
                            <img src="{{ asset('img/static/about/lefteris-kallergis-GgTcGbP5NtA-unsplash.jpg') }}" class="to-bottom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="my-5">
<section id="recommended-rooms" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h6 class="text-uppercase mb-3">Rooms</h6>
                <h3 class="mb-5">Recommended Room</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @foreach ($room as $rooms)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
            <div class="rooms">
                <img src="{{ Storage::url($rooms->thumbnail) }}" alt="room-{{ $rooms->id }}">
                <div class="room-detail">
                    <div class="room-title">
                        <a href="{{ action('StaticController@droom', $rooms->slug) }}">{{ $rooms->title }}</a>
                        <h6>Rp. {{ number_format($rooms->budget, 0, ',', '.') }}<sub>/night</sub></h6>
                    </div>
                    <div class="room-body">
                        <table cellpadding="10" cellspacing="10">
                            <tr>
                                <td>Size:</td>
                                <td>{{ $rooms->size }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>{{ $rooms->capacity }}</td>
                            </tr>
                            <tr>
                                <td>Services:</td>
                                <td>
                                    @foreach ($rooms->service as $services)
                                    {{ $services->service }},
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <a href="{{ action('StaticController@droom', $rooms->slug) }}" class="btn more-detail rounded-0 text-uppercase">more detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="testimonials" class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h6 class="text-uppercase mb-3">testimonials</h6>
                <h3 class="mb-5">What Customers Say?</h3>
            </div>
        </div>
        <div id="controls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <p>After a construction project took longer than expected, my husband, my daughter
                                    and I
                                    needed a place to stay for a few nights. As a Chicago resident, we know a lot
                                    about our
                                    city, neighborhood and the types of housing options available and absolutely
                                    love our
                                    vacation at Sona Hotel.</p>
                                <div class="rate mt-5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    &mdash;
                                    <span class="text-capitalize">alexander tejo</span>
                                    <div class="users mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <p>After a construction project took longer than expected, my husband, my daughter
                                    and I
                                    needed a place to stay for a few nights. As a Chicago resident, we know a lot
                                    about our
                                    city, neighborhood and the types of housing options available and absolutely
                                    love our
                                    vacation at Sona Hotel.</p>
                                <div class="rate mt-5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    &mdash;
                                    <span class="text-capitalize">nining vasquez</span>
                                    <div class="users mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <p>After a construction project took longer than expected, my husband, my daughter
                                    and I
                                    needed a place to stay for a few nights. As a Chicago resident, we know a lot
                                    about our
                                    city, neighborhood and the types of housing options available and absolutely
                                    love our
                                    vacation at Sona Hotel.</p>
                                <div class="rate mt-5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    &mdash;
                                    <span class="text-capitalize">tuti similikiti</span>
                                    <div class="users mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#controls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#controls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
<section id="blog-events" class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h6 class="text-uppercase mb-3">hotel news</h6>
                <h3 class="mb-5">Our Blog & Event</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($blog as $blogs)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 blog mt-4 position-relative" id="blog-{{ $loop->iteration }}">
                <img src="{{ Storage::url($blogs->thumbnail) }}" style="height: 500px">
                <div class="label-blog">
                    @foreach ($blogs->tag->take(1) as $tags)
                    <span class="text-uppercase">{{ $tags->tag }}</span>
                    @endforeach
                    <a href="{{ route('detail_blog', $blogs->slug) }}" class="text-capitalize">{{ $blogs->title }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="faq" class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3 class="mb-5">Frequently Asked Question</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach ($faq as $faqs)    
                <div class="accrodion-regular">
                    <div id="accordion">
                        <div class="card mb-2">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-{{ $faqs->id }}" aria-expanded="false">
                                        <span class="fas fa-angle-down mr-3"></span>{{ $faqs->question }}
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-{{ $faqs->id }}" class="collapse">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $faqs->answer }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection