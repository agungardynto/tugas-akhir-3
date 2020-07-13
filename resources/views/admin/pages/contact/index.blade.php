@extends('admin.app')
@section('contact', 'active')
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">Message</th>
                                <th scope="col" class="border-bottom-0">Address</th>
                                <th scope="col" class="border-bottom-0">Phone</th>
                                <th scope="col" class="border-bottom-0">Email</th>
                                <th scope="col" class="border-bottom-0">Fax</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contact as $contact_us)
                            <tr>
                                <th class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#contact-{{ $contact_us->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </th>
                                <td>{{ $contact_us->message }}</td>
                                <td>{{ $contact_us->address }}</td>
                                <td>{{ $contact_us->phone }}</td>
                                <td>{{ $contact_us->email }}</td>
                                <td>{{ $contact_us->fax }}</td>
                            </tr>
                            <div class="modal fade" id="contact-{{ $contact_us->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Our Contact</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('contact.update', $contact_us->id) }}" method="post">
                                            @method('put')

                                            @csrf

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="message">Message</label>
                                                            <textarea name="message" id="message" rows="3" class="form-control">{{ $contact_us->message }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $contact_us->phone }}" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="fax">Fax</label>
                                                            <input type="text" name="fax" id="fax" class="form-control" value="{{ $contact_us->fax }}" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" name="email" id="email" class="form-control" value="{{ $contact_us->email }}" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <textarea name="address" id="address" rows="3" class="form-control">{{ $contact_us->address }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
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
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h3 class="mb-0">
                    <span class="text-uppercase" style="color: rgb(255, 73, 182)">{{ env('APP_NAME')  }}</span><sup>feeds</sup>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered second">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0"></th>
                                <th scope="col" class="border-bottom-0">Name</th>
                                <th scope="col" class="border-bottom-0">Email</th>
                                <th scope="col" class="border-bottom-0">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($feed as $feeds)
                            <tr>
                                <th class="text-center" style="width: 50px">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#feed-{{ $feeds->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </th>
                                <td>{{ $feeds->name }}</td>
                                <td>{{ $feeds->email }}</td>
                                <td>{{ $feeds->message }}</td>
                            </tr>
                            <div class="modal fade" id="feed-{{ $feeds->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Our Contact</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="accrodion-regular">
                                                <div id="accordion3">
                                                    <div class="card mb-2">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{ $feeds->id }}" aria-expanded="true">
                                                                    <span class="fas fa-angle-down mr-3"></span>{{ $feeds->name }}
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse-{{ $feeds->id }}" class="collapse show">
                                                            <div class="card-body">
                                                                <blockquote class="blockquote mb-0">
                                                                    <p>{{ $feeds->message }}</p>
                                                                    <footer class="blockquote-footer">{{ date('d/m/Y', strtotime($feeds->created_at)) }} <cite title="{{ $feeds->name }}">{{ $feeds->email }}</cite></footer>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
</div>
@endsection
