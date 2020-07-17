@extends('admin.app')
@section('room', 'active')
@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/select2.min.css') }}">
    <style>
        .form-control,
        .custom-file-input,
        .custom-file-label {
            box-shadow: none !important;
        }
        .ck-editor__editable_inline {
            height: 187px;
            width: 100%;
        }
    </style>
@endpush
@push('js')
<script src="{{ asset('js/up.down.js') }}"></script>
<script src="{{ asset('js/admin/select2.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
        $(".services").select2({
            placeholder: "Select a service for room"
        });
        ClassicEditor.create(document.querySelector('#description'));
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
                <form action="{{ route('room.store') }}" id="basicform" method="post" enctype="multipart/form-data">
                    @csrf
                        
                    <div class="form-group">
                        <label for="title">Room Title</label>
                        <input id="title" type="text" name="title" placeholder="Enter Room Title" value="{{ old('title') }}" autocomplete="off" class="form-control @error('title') is-invalid @enderror">
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="size">Size Room</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                      <button class="btn btn-primary sr-up d-flex align-items-center" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    </div>
                                    <input style="text-align: center" id="size" name="size" type="text" class="form-control @error('size') is-invalid @enderror" value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger sr-down d-flex align-items-center" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="capacity">Capacity Room</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                      <button class="btn btn-primary cr-up d-flex align-items-center" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    </div>
                                    <input style="text-align: center" id="capacity" type="text" name="capacity" enabled="false" class="form-control @error('capacity') is-invalid @enderror" value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger cr-down d-flex align-items-center" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="service">Select Service</label>
                                <select class="services js-states form-control" id="service" name="service[]" multiple="multiple">
                                    @foreach ($service as $services)
                                    <option value="{{ $services->id }}">{{ $services->service }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="description">Description Room</label>
                                <textarea name="description" id="description">{{ old('description') }}</textarea>
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="input-group mt-4 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary border-primary">Indonesia Rupiah (IDR)</span>
                                </div>
                                <input type="text" name="budget" class="form-control @error('budget') is-invalid @enderror" placeholder="Budget">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-secondary border-secondary">Image Thumbnail</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" required name="thumbnail" class="custom-file-input" id="thumbnail">
                                    <label class="custom-file-label" for="thumbnail" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 85px">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <a href="{{ route('room.index') }}" class="btn btn-space btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
