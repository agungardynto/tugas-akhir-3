@extends('user.app')
@section('dashboard', 'active')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">History Booking</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">Check In</th>
                                <th scope="col" class="border-bottom-0">Check Out</th>
                                <th scope="col" class="border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($booking as $data)
                            <tr>
                                <th scope="row" style="width: 50px">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#book-{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </th>
                                <td>{{ date('d/m/Y', strtotime($data->check_in)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->check_out)) }}</td>
                                <td>{{ $data->status == 1 ? 'Applicable' : 'Pay Off' }}</td>
                            </tr>
                            <div class="modal fade" id="book-{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">QR Code</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card mb-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 d-flex align-items-center justify-content-center pl-3">
                                                        <img class="card-img" src="data:image/png;base64,{{ DNS2D::getBarcodePNG($data->code, 'QRCODE', 5,5) }}" alt="barcode" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                                            <p class="card-text">Save the barcode next to the lodging process.</p>
                                                            <small>Booking -> {{ date('d/m/Y', strtotime($data->created_at)) }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">History Booking (<span style="color: rgb(255, 73, 182)">Expired</span>)</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">Check In</th>
                                <th scope="col" class="border-bottom-0">Check Out</th>
                                <th scope="col" class="border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expired as $ex)
                            <tr>
                                <th scope="row" style="width: 50px">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ex-{{ $ex->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </th>
                                <td>{{ date('d/m/Y', strtotime($ex->check_in)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($ex->check_out)) }}</td>
                                <td>Expired</td>
                            </tr>
                            <div class="modal fade" id="ex-{{ $ex->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">QR Code</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card mb-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 d-flex align-items-center justify-content-center pl-3">
                                                        <img class="card-img" src="data:image/png;base64,{{ DNS2D::getBarcodePNG($ex->code, 'QRCODE', 5,5) }}" alt="barcode" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                                            <p class="card-text">Save the barcode next to the lodging process.</p>
                                                            <small>Booking -> {{ date('d/m/Y', strtotime($ex->created_at)) }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection