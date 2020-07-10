@extends('admin.app')
@section('contact', 'active')
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
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#contact-{{ $contact_us->id }}">
                                    <i class="fas fa-eye"></i>
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
                                    <div class="modal-body">
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h3 class="mb-0">
                    <span class="text-uppercase" style="color: rgb(255, 73, 182)">{{ env('APP_NAME')  }}</span><sup>feeds</sup>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
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
@endsection
