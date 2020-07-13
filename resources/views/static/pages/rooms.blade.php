@extends('static.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/custom-style-pagination.css') }}" type="text/css">
@endsection
@section('content')
<section id="rooms" class="my-100">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3>Our Rooms</h3>
                <ol class="breadcrumb bg-transparent justify-content-center mb-5">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                </ol>
            </div>
        </div>
        <div class="row">
            @foreach ($room as $rooms)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <img src="{{ Storage::url($rooms->thumbnail) }}" class="card-img-top rounded-0" alt="screen-{{ $rooms->id }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rooms->title }}</h5>
                        <small class="text-muted">Rp. {{ number_format($rooms->budget, 2, ',', '.') }}</small>
                        <table cellpadding="10" cellspacing="10" class="my-4">
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
                                    <span class="badge badge-primary">{{ $services->service }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <a href="{{ route('detail_room', $rooms->slug) }}" class="btn more-detail rounded-0 text-uppercase float-right">more
                            detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                {{ $room->links() }}
            </div>
        </div>
    </div>
</section>
@endsection