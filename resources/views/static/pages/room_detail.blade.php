@extends('static.app')
@section('css')
<link rel="stylesheet" href="{{ asset('sona/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('sona/css/style.css') }}" type="text/css">
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
                    <h2>Our Room</h2>
                    <ol class="breadcrumb bg-transparent justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('rooms') }}">Room</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $room->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="{{ Storage::url($room->thumbnail) }}" alt="img-room" style="width:100%; height: 418px; object-fit: cover; object-position: center">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{ $room->title }}</h3>
                            <div class="rdt-right">
                                <h2>Rp. {{ number_format($room->budget, 2, ',', '.') }}<span>/Pernight</span></h2>
                            </div>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>{{ $room->size }} m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max person {{ $room->capacity }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>
                                        @foreach ($room->service as $services)
                                        <span class="badge badge-primary">{{ $services->service }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para text-justify">{!! $room->description !!}</p>
                    </div>
                </div>
                <div class="rd-reviews mb-0"></div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    @guest
                    <h3>Your Reservation</h3>
                    <a href="{{ route('register') }}" class="btn btn-block btn-secondary">Register</a>
                    @else
                    @if (Auth::user()->role == 2)
                    <h3>Your Reservation</h3>
                    <form action="{{ action('StaticController@booking', $room->slug) }}" method="post">
                        @csrf
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" name="check_in" class="date-input" id="date-in" autocomplete="off">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" name="check_out" class="date-input" id="date-out" autocomplete="off">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select name="guest" id="guest">
                                @for ($i = 1; $i <= $room->capacity; $i++)
                                <option value="{{ $i }}">{{ $i }} Adults</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit">Booking Now</button>
                    </form>
                    @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
