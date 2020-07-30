@extends('admin.app')
@section('company', 'active')
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#company">Create</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered second">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">City</th>
                                <th scope="col" class="border-bottom-0">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($company as $items)
                            <tr>
                                <th class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-{{ $loop->iteration }}"><i class="fas fa-edit"></i></button>
                                </th>
                                <td>{{ $items->city }}</td>
                                <td>{{ $items->address }}</td>
                            </tr>
                            <div class="modal fade" id="edit-{{ $loop->iteration }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Company Location</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('company.update', $items->id) }}" method="post">
                                            @method('put')
                                            @csrf
                            
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    @error('city')
                                                    <small class="text-danger ml-2">*{{ $message }}</small>
                                                    @enderror
                                                    <input type="text" name="city" id="city" class="form-control" autocomplete="off" placeholder="Enter City" value="{{ $items->city }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    @error('address')
                                                    <small class="text-danger ml-2">{{ $message }}</small>
                                                    @enderror
                                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control" placeholder="Enter Address">{{ $items->address }}</textarea>
                                                </div>
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
                                <td colspan="3">
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
</div>
<div class="modal fade" id="company" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Company Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('company.store') }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="city">City</label>
                        @error('city')
                        <small class="text-danger ml-2">*{{ $message }}</small>
                        @enderror
                        <input type="text" name="city" id="city" class="form-control" autocomplete="off" placeholder="Enter City">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        @error('address')
                        <small class="text-danger ml-2">{{ $message }}</small>
                        @enderror
                        <textarea name="address" id="address" cols="30" rows="10" class="form-control" placeholder="Enter Address"></textarea>
                    </div>
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
