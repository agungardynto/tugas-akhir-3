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
                            <th scope="col" class="border-bottom-0">Post</th>
                            <th scope="col" class="border-bottom-0">Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center"><a href="#" class="badge badge-info"><i class="fas fa-eye"></i></a></th>
                            <td class="text-nowrap" style="max-width: 200px; overflow-x: hidden">test</td>
                            <td class="text-nowrap" style="max-width: 200px; overflow-x: hidden">test</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-primary mb-0" role="alert">Data Kosong</div>
                            </td>
                        </tr>
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
