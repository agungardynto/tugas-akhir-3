@extends('static.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/custom-style-pagination.css') }}" type="text/css">
<style>
    .form-control {
        border-color: rgb(255, 73, 182);
    }
    .form-control:focus,
    .form-control:active {
        border-color: rgb(255, 73, 182) !important;
    }
    .btn-pink {
        background-color: rgb(255, 73, 182);
        color: white;
    }
    .btn-pink:hover {
        color: white;
        background-color: rgb(255, 20, 182);
    }
</style>
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
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <form action="{{ action('StaticController@rooms') }}" method="get">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: rgb(255, 73, 182); color: #fff; border-color: rgb(255, 73, 182)">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="keywords" placeholder="Budget, Title,.." autocomplete="off" autofocus>
                        <button type="submit" class="btn btn-sm rounded-0 btn-pink ml-2">Go</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse ($room as $rooms)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <img src="{{ Storage::url($rooms->thumbnail) }}" class="card-img-top rounded-0" alt="screen-{{ $rooms->id }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rooms->title }}</h5>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Rp. {{ number_format($rooms->budget, 2, ',', '.') }}</small>
                            <small><i class="fa fa-heart" aria-hidden="true" style="color: red"></i> {{ DB::table('like')->where('room_id', $rooms->id)->count() }}</small>
                        </div>
                        <table cellpadding="10" cellspacing="10" class="my-4">
                            <tr>
                                <td>Size:</td>
                                <td>{{ $rooms->size }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>Max Person {{ $rooms->capacity }}</td>
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
            @empty
            <div class="col-12">
                <div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>Oops!</h1>
                            <h2>404 - The Data can't be found</h2>
                        </div>
                        <a href="{{ route('rooms') }}">show all rooms</a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                {{ $room->links() }}
            </div>
        </div>
    </div>
</section>
@endsection