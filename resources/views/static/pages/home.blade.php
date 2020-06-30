@extends('static.app')
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
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <h1 class="text-capitalize">sona a luxury hotel</h1>
                    <p class="mb-5">Here are the best hotel booking sites, including recommendations for
                        international
                        travel and for
                        finding low-priced hotel rooms.</p>
                    <a href="#" class="text-uppercase">discover now</a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 fast-book">
                    <div class="card">
                        <div class="card-body py-5">
                            <h3 class="text-capitalize text-center mb-5">booking your hotel</h3>
                            <form>
                                <div class="form-group">
                                    <label for="checkin">Check In:</label>
                                    <input type="date" class="form-control" id="checkin">
                                </div>
                                <div class="form-group">
                                    <label for="checkout">Check Out:</label>
                                    <input type="date" class="form-control" id="checkout">
                                </div>
                                <div class="form-group">
                                    <label>Guests:</label>
                                    <select class="form-control">
                                        <option class="text-uppercase">2 adults</option>
                                        <option class="text-uppercase">3 adults</option>
                                        <option class="text-uppercase">4 adults</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room:</label>
                                    <select class="form-control">
                                        <option class="text-uppercase">1 room</option>
                                        <option class="text-uppercase">2 room</option>
                                        <option class="text-uppercase">3 room</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-block mt-3 text-uppercase">check
                                    availability</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<hr class="my-100">
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h6 class="text-uppercase mb-3">about us</h6>
                <h3 class="mb-5">Intercontinental LA Westlake Hotel</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 py-5 services text-center">
                <i class="fas fa-map-signs mb-3"></i>
                <h5>Travel Plan</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna.</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 py-5 services text-center">
                <i class="fas fa-person-booth mb-3"></i>
                <h5>Catering Service</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna.</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 py-5 services text-center">
                <i class="fas fa-baby-carriage mb-3"></i>
                <h5>Babysitting</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna.</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 py-5 services text-center">
                <i class="fas fa-tshirt mb-3"></i>
                <h5>Laundry</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna.</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 py-5 services text-center">
                <i class="fas fa-clock mb-3"></i>
                <h5>Hire Driver</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna.</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 py-5 services text-center">
                <i class="fas fa-glass-cheers mb-3"></i>
                <h5>Bar & Drink</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna.</p>
            </div>
        </div>
    </div>
</section>
<section id="recommended-rooms" class="mt-5">
    <div class="container-fluid">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
            <div class="rooms">
                <div class="room-detail">
                    <div class="room-title">
                        <a href="#">Double Room</a>
                        <h6>&dollar; 199<sub>/per-Night</sub></h6>
                    </div>
                    <div class="room-body">
                        <table cellpadding="10" cellspacing="10">
                            <tr>
                                <td>Size:</td>
                                <td>30 ft</td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>Max Persion 5</td>
                            </tr>
                            <tr>
                                <td>Bed:</td>
                                <td>King Beds</td>
                            </tr>
                            <tr>
                                <td>Services:</td>
                                <td>Wifi, Television, Bathroom</td>
                            </tr>
                        </table>
                    </div>
                    <a href="#" class="btn more-detail rounded-0 text-uppercase">more detail</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
            <div class="rooms">
                <div class="room-detail">
                    <div class="room-title">
                        <a href="#">Premium King</a>
                        <h6>&dollar; 159<sub>/per-Night</sub></h6>
                    </div>
                    <div class="room-body">
                        <table cellpadding="10" cellspacing="10">
                            <tr>
                                <td>Size:</td>
                                <td>30 ft</td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>Max Persion 5</td>
                            </tr>
                            <tr>
                                <td>Bed:</td>
                                <td>King Beds</td>
                            </tr>
                            <tr>
                                <td>Services:</td>
                                <td>Wifi, Television, Bathroom</td>
                            </tr>
                        </table>
                    </div>
                    <a href="#" class="btn more-detail rounded-0 text-uppercase">more detail</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
            <div class="rooms">
                <div class="room-detail">
                    <div class="room-title">
                        <a href="#">Deluxe Room</a>
                        <h6>&dollar; 198<sub>/per-Night</sub></h6>
                    </div>
                    <div class="room-body">
                        <table cellpadding="10" cellspacing="10">
                            <tr>
                                <td>Size:</td>
                                <td>30 ft</td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>Max Persion 5</td>
                            </tr>
                            <tr>
                                <td>Bed:</td>
                                <td>King Beds</td>
                            </tr>
                            <tr>
                                <td>Services:</td>
                                <td>Wifi, Television, Bathroom</td>
                            </tr>
                        </table>
                    </div>
                    <a href="#" class="btn more-detail rounded-0 text-uppercase">more detail</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3">
            <div class="rooms">
                <div class="room-detail">
                    <div class="room-title">
                        <a href="#">Family Room</a>
                        <h6>&dollar; 299<sub>/per-Night</sub></h6>
                    </div>
                    <div class="room-body">
                        <table cellpadding="10" cellspacing="10">
                            <tr>
                                <td>Size:</td>
                                <td>30 ft</td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>Max Persion 5</td>
                            </tr>
                            <tr>
                                <td>Bed:</td>
                                <td>King Beds</td>
                            </tr>
                            <tr>
                                <td>Services:</td>
                                <td>Wifi, Television, Bathroom</td>
                            </tr>
                        </table>
                    </div>
                    <a href="#" class="btn more-detail rounded-0 text-uppercase">more detail</a>
                </div>
            </div>
        </div>
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
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 blog mt-4 position-relative">
                <img src="{{ asset('img/static/blog-events/gerson-repreza-CepDpEiALqM-unsplash.jpg') }}">
                <div class="label-blog">
                    <span class="text-uppercase">travel trip</span>
                    <a href="#" class="text-capitalize">tremblant in canada</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 blog mt-4 position-relative">
                <img src="{{ asset('img/static/blog-events/sara-dubler-Koei_7yYtIo-unsplash.jpg') }}">
                <div class="label-blog">
                    <span class="text-uppercase">camping</span>
                    <a href="#" class="text-capitalize">choosing a static caravan</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 blog mt-4 position-relative">
                <img src="{{ asset('img/static/blog-events/taylor-simpson-8NL7y_DHF7w-unsplash.jpg') }}">
                <div class="label-blog">
                    <span class="text-uppercase">event</span>
                    <a href="#" class="text-capitalize">copper canyon</a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 blog mt-4 position-relative overflow-hidden">
                <img src="{{ asset('img/static/blog-events/claudia-altamimi-dEGNA6jIcBM-unsplash.jpg') }}">
                <div class="label-blog">
                    <span class="text-uppercase">event</span>
                    <a href="#" class="text-capitalize">trip to iqaluit in nunavut a canadian arctic city</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 blog mt-4 position-relative">
                <img src="{{ asset('img/static/blog-events/taylor-simpson-GdwGZbU8PgI-unsplash.jpg') }}">
                <div class="label-blog">
                    <span class="text-uppercase">travel</span>
                    <a href="#" class="text-capitalize">traveling to barcelona</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection