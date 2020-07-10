@extends('admin.app')
@section('room', 'active')
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="border-bottom-0"></th>
                            <th scope="col" class="border-bottom-0">Title</th>
                            <th scope="col" class="border-bottom-0">Size</th>
                            <th scope="col" class="border-bottom-0">Capacity</th>
                            <th scope="col" class="border-bottom-0">Services</th>
                            <th scope="col" class="border-bottom-0">Budget</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($room as $rooms)
                        <tr>
                            <th style="width: 110px">
                                <a href="{{ action('StaticController@droom', $rooms->slug) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('room.edit', $rooms->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                            </th>
                            <td>{{ $rooms->title }}</td>
                            <td>{{ $rooms->size }} m<sup>2</sup></td>
                            <td>Max Person {{ $rooms->capacity }}</td>
                            <td>
                                @foreach ($rooms->service as $services)
                                <span class="badge @if ($services->service == 'Wifi')
                                badge-primary
                                @elseif($services->service == 'Television' || $services->service == 'AC')
                                badge-secondary
                                @elseif($services->service == 'Bathroom')
                                badge-info
                                @endif">{{ $services->service }}</span>
                                @endforeach
                            </td>
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
                <h4 class="my-3">Avaliable Room Services</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="border-bottom-0"></th>
                            <th scope="col" class="border-bottom-0">Services</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($service as $services)
                        <tr>
                            <th style="width: 50px">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#service-{{ $services->id }}"><i class="fas fa-edit"></i></button>
                            </th>
                            <td>{{ $services->service }}</td>
                        </tr>
                        <div class="modal fade" id="service-{{ $services->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update Service</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('service.update', $services->id) }}" method="post">
                                        @method('patch')
                                        
                                        @csrf
                        
                                        <div class="modal-body">
                                            <input type="text" name="service" class="form-control" autocomplete="off" placeholder="Enter Service" value="{{ $services->service }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-primary mb-0" role="alert">Data Kosong</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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
