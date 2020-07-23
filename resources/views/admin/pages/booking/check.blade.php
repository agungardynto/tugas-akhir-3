@extends('admin.app')
@section('booking', 'active')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <span class="text-uppercase" style="color: rgb(255, 73, 182)">{{ env('APP_NAME')  }}</span><sup>{{ $title }}</sup>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <form action="{{ route('booking.show') }}" method="post" id="shw_cks">
                            @csrf
        
                            <div id="app">
                                <qr-check></qr-check>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection