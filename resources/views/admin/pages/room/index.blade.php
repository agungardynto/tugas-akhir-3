@extends('admin.app')
@section('room', 'active')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/select.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/fixedHeader.bootstrap4.css') }}">
@endsection
@section('js')
<script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/js/data-table.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.colVis.min.js') }}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h3 class="mb-0">
                    <span class="text-uppercase" style="color: rgb(255, 73, 182)">{{ env('APP_NAME')  }}</span><sup>{{ $title }}</sup>
                </h3>
                <div>
                    <a href="{{ route('room.create') }}" class="btn btn-primary">Create Room</a>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#room">Create Service</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered second">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">Title</th>
                                <th scope="col" class="border-bottom-0">Size</th>
                                <th scope="col" class="border-bottom-0">Capacity</th>
                                <th scope="col" class="border-bottom-0">Budget</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($room as $rooms)
                            <tr>
                                <th class="text-center" style="width: 110px">
                                    <a href="{{ action('StaticController@droom', $rooms->slug) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('room.edit', $rooms->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                </th>
                                <td>{{ $rooms->title }}</td>
                                <td>{{ $rooms->size }} m<sup>2</sup></td>
                                <td>Max Person {{ $rooms->capacity }}</td>
                                <td>Rp. {{ number_format($rooms->budget, 2, ',', '.') }}</td>
                            </tr>                        
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-primary mb-0" role="alert">Data Kosong</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <p class="mb-0">Services Avaliable :</p>
                @forelse ($service as $services)
                <span class="badge badge-primary mt-1">{{ $services->service }}</span>
                @empty
                <span>No Avaliable Service</span>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="room" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('service.store') }}" method="post">
                @csrf

                <div class="modal-body">
                    <input type="text" name="service" class="form-control" autocomplete="off" placeholder="Enter Service">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
