@extends('admin.app')
@section('blog', 'active')
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
                    <a href="{{ route('blog.create') }}" class="btn btn-secondary">Create Blog</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tag">Create Tags</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered second">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">Title</th>
                                <th scope="col" class="border-bottom-0">Tag</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_blog as $blog_item)
                            <tr>
                                <th class="text-center" style="width: 110px">
                                    <a href="{{ route('detail_blog', $blog_item->slug) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('blog.edit', $blog_item->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                </th>
                                <td>{{ $blog_item->title }}</td>
                                <td>
                                    @foreach ($blog_item->tag as $tags)
                                    <span class="badge badge-danger">{{ $tags->tag }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-primary mb-0" role="alert">Data Kosong</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <p class="mb-0">Tags Avaliable :</p>
                @forelse ($tag as $tags)
                <span class="badge badge-primary mt-1">{{ $tags->tag }}</span>
                @empty
                <span>No Avaliable Tag</span>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tag" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tag.store') }}" method="post">
                @csrf

                <div class="modal-body">
                    <input type="text" name="tag" class="form-control" autocomplete="off" placeholder="Enter Tag">
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
