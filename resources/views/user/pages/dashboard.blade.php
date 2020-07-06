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
                                <th scope="col"></th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Booking</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($booking as $data)
                            <tr>
                                <th scope="row"></th>
                                <td>{{ date('d/m/Y', strtotime($data->check_in)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->check_out)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->created_at)) }}</td>
                                <td>{{ $data->status == 0 ? 'Expired' : 'Applicable' }}</td>
                            </tr>
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