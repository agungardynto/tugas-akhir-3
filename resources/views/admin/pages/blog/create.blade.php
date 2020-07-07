@extends('admin.app')
@section('blog', 'active')
@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/select2.min.css') }}">
    <style>
        .form-control,
        .custom-file-input,
        .custom-file-label {
            box-shadow: none !important;
        }
        .ck-editor__editable_inline {
            height: 200px;
            width: 100%;
        }
    </style>
@endpush
@push('js')
<script src="{{ asset('js/admin/select2.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
        $(".tags").select2({
            placeholder: "Select a tag"
        });
        ClassicEditor.create(document.querySelector('#post'));
    });
</script>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h3 class="mb-0">
                    <span class="text-uppercase"
                        style="color: rgb(255, 73, 182)">{{ env('APP_NAME')  }}</span><sup>{{ $title }}</sup>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.store') }}" id="basicform" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input id="title" type="text" name="title" placeholder="Enter Blog Title" value="{{ old('title') }}" autocomplete="off" class="form-control @error('title') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="post">Blog Posts</label>
                        {{-- <textarea name="post" id="post" cols="30" rows="10" class="form-control @error('post') is-invalid @enderror"
                            placeholder="Enter Blog Post">{{ old('post') }}</textarea> --}}
                        <textarea name="post" id="post">{{ old('post') }}</textarea>
                        @error('post')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="tags js-states form-control" name="tag[]" multiple="multiple">
                            @foreach ($tag as $tags)
                            <option value="{{ $tags->id }}">{{ $tags->tag }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-secondary border-secondary">Image Thumbnail</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mt-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-secondary border-secondary">Image Post</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image_post" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <a href="{{ route('blog.index') }}" class="btn btn-space btn-secondary">Cancel</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
