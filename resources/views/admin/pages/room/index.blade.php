@extends('admin.app')
@section('room', 'active')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-0">
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
                            <th class="text-center">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail-{{ $rooms->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            <td>{{ $rooms->title }}</td>
                            <td>{{ $rooms->size }} m<sup>2</sup></td>
                            <td>{{ $rooms->capacity }}</td>
                            <td>
                                @foreach ($rooms->service as $services)
                                <span class="badge @if ($services->service == 'Wifi')
                                badge-primary
                                @elseif($services->service == 'Television')
                                badge-secondary
                                @elseif($services->service == 'Bathroom')
                                badge-info
                                @endif">{{ $services->service }}</span>
                                @endforeach
                            </td>
                            <td>Rp. {{ number_format($rooms->budget, 2, ',', '.') }}</td>
                        </tr>
                        <div class="modal fade" id="detail-{{ $rooms->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $rooms->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-2">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="{{ Storage::url($rooms->thumbnail) }}" class="card-img" alt="thumbnail-{{ $rooms->id }}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            has a size of {{ $rooms->size }}m<sup>2</sup> and can accommodate a {{ $rooms->capacity }}, with a budget of {{ $rooms->budget }}/night can get all the services in this room
                                                        </p>
                                                        <p class="card-text"><small class="text-muted">Last updated {{ date('d/m/Y', strtotime($rooms->updated_at)) }}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>                          
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
