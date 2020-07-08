@extends('admin.app')
@section('faq', 'active')
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
                            <th scope="col" class="border-bottom-0">Question</th>
                            <th scope="col" class="border-bottom-0">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faq as $faqs)
                        <tr>
                            <th scope="row" style="width: 50px">
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#faq-{{ $faqs->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </th>
                            <td>{{ $faqs->question }}</td>
                            <td>{{ $faqs->answer }}</td>
                        </tr>
                        <div class="modal fade" id="faq-{{ $faqs->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('faq.update', $faqs->id) }}" method="post">
                                        <div class="modal-body">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    @method('patch')

                                                    @csrf
                                                    
                                                    <div class="form-group">
                                                        <label for="question">Question</label>
                                                        <input type="text" name="question" id="question" class="form-control" value="{{ $faqs->question }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="answer">Answer</label>
                                                        <textarea name="answer" id="answer" cols="30" rows="10" class="form-control">{{ $faqs->answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Data Tidak Ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
