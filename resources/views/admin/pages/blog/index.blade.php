@extends('admin.app')
@section('blog', 'active')
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
                        @forelse ($data_blog as $blog_item)
                        <tr>
                            <th class="text-center"><a href="#" class="badge badge-info"><i class="fas fa-eye"></i></a></th>
                            <td class="text-nowrap" style="max-width: 200px; overflow-x: hidden">{{ $blog_item->title }}</td>
                            <td class="text-nowrap" style="max-width: 200px; overflow-x: hidden">{{ $blog_item->post }}</td>
                            <td>
                                @foreach ($blog_item->tag as $tags)
                                <span class="badge @if ($tags->tag == 'Travel Trip')
                                'badge-secondary'
                                @elseif ($tags->tag == 'Event')
                                'badge-primary'
                                @endif">{{ $tags->tag }}</span>
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
