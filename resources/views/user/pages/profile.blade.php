@extends('user.app')
@section('profile', 'active')
@push('js')
<script>
    $('#choose-foto').change(function () {
        if (this.files[0]) {
            var reader = new FileReader;
            reader.onload = function (e) {
                $('#foto').attr('src', e.target.result)
            }
            reader.readAsDataURL(this.files[0])
        }
    })
</script>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0 text-right">
                    <h3 class="btn btn-secondary">Member Since : {{ date('d/m/Y', strtotime(Auth::user()->created_at)) }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ action('UserController@update_profile') }}" method="POST" enctype="multipart/form-data">
                        @method('patch')

                        @csrf

                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 d-flex justify-content-center">
                                <div class="dashboard-user-profile">
                                    <img src="{{ Storage::url(Auth::user()->foto) }}" alt="profile-pic" id="foto">
                                    <div class="choose-now d-flex align-items-center justify-content-center">
                                        <label for="choose-foto" class="d-flex flex-column align-items-center"><i class="fas fa-2x fa-upload"></i><span class="mt-1">Change Foto</span></label>
                                        <input type="file" name="foto" id="choose-foto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                                <div class="form-group">
                                    <label for="full-name">Full Name</label>
                                    <input id="full-name" type="text" name="name" placeholder="Your Name" autocomplete="off" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Your Address">{{ Auth::user()->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="gender">Password</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="L" {{ Auth::user()->gender == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="P" {{ Auth::user()->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input id="phone_number" name="phone_number" type="text" placeholder="Your Phone Number" class="form-control" value="{{ Auth::user()->phone_number }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input id="email" name="email" disabled type="text" placeholder="Your Email Address" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group mb-0 mt-1">
                                    <button type="submit" class="btn btn-space btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection