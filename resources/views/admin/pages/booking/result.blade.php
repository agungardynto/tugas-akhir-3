@extends('admin.app')
@section('booking', 'active')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ Storage::url($res->room->thumbnail) }}" class="card-img p-3" style="height: 500px"
                        alt="pic">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Unique Code : {{ $res->code }}</h5>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 50px">Room Title</td>
                                    <td style="width: 20px" class="text-center"><i class="fas fa-arrow-right"></i></td>
                                    <td>{{ $res->room->title }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-0" style="width: 50px">Guest Max</td>
                                    <td style="width: 20px" class="text-center border-top-0"><i
                                            class="fas fa-arrow-right"></i></td>
                                    <td class="border-top-0">{{ $res->room->capacity }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-0" style="width: 50px">Room Size</td>
                                    <td style="width: 20px" class="text-center border-top-0"><i
                                            class="fas fa-arrow-right"></i></td>
                                    <td class="border-top-0">{{ $res->room->size }} m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td class="border-top-0" style="width: 50px">Services</td>
                                    <td style="width: 20px" class="text-center border-top-0"><i
                                            class="fas fa-arrow-right"></i></td>
                                    <td class="border-top-0">
                                        @foreach ($res->room->service as $services)
                                        <span class="badge badge-secondary">{{ $services->service }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-borderless mt-4">
                            <tbody>
                                <tr>
                                    <td style="width: 50px">Customer</td>
                                    <td style="width: 20px" class="text-center"><i class="fas fa-arrow-right"></i></td>
                                    <td>{{ $res->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-0" style="width: 50px">Guest</td>
                                    <td style="width: 20px" class="text-center border-top-0"><i
                                            class="fas fa-arrow-right"></i></td>
                                    <td class="border-top-0">{{ $res->guest }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-0" style="width: 50px">Check IN</td>
                                    <td style="width: 20px" class="text-center border-top-0"><i
                                            class="fas fa-arrow-right"></i></td>
                                    <td class="border-top-0">{{ date('l, d F Y', strtotime($res->check_in)) }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-0" style="width: 50px">Check OUT</td>
                                    <td style="width: 20px" class="text-center border-top-0"><i
                                            class="fas fa-arrow-right"></i></td>
                                    <td class="border-top-0">{{ date('l, d F Y', strtotime($res->check_out)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($res->status == 0)    
                        <div class="mt-4">
                            <p class="btn btn-block btn-secondary">Was Expired</p>
                        </div>
                        @elseif ($res->status == 2)
                        <div class="mt-4">
                            <p class="btn btn-block btn-primary">Paid Off</p>
                        </div>
                        @else
                        <div class="d-flex justify-content-between align-content-center mt-4">
                            <div class="d-flex align-items-center font-weight-bold" style="font-size: 20px">
                                TOTAL <i class="fas fa-arrow-right mx-3"></i>
                                Rp.
                                {{ number_format((intval(date('d', strtotime($res->check_out))) - intval(date('d', strtotime($res->check_in)))) * $res->room->budget, 2, ',', '.') }}
                            </div>
                            <div class="action">
                                <form action="{{ route('booking.update', $res->code) }}" method="post" class="d-inline-block">
                                    @method('patch')

                                    @csrf

                                    <button type="submit" class="btn btn-primary">Pay Off</button>
                                </form>
                                <a href="{{ route('booking.index') }}" class="btn btn-info">Cancel</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
