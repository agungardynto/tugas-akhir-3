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
                <form action="{{ route('booking.show') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="code">Unique Code</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Enter Unique Code..." autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>      
            </div>
        </div>
    </div>
</div>
@endsection