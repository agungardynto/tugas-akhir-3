@extends('static.app')
@section('content')
<section id="contact" class="my-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <h3 style="color: var(--pink);">Contact Info</h3>
                <p class="mt-4">{{ $contact->message }}</p>
                <table cellpadding="10">
                    <tr valign="top">
                        <td>Address:</td>
                        <td>{{ $contact->address }}</td>
                    </tr>
                    <tr valign="top">
                        <td>Phone:</td>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr valign="top">
                        <td>Email:</td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr valign="top">
                        <td>Fax:</td>
                        <td>+{{ $contact->fax }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                <form action="{{ action('StaticController@send_message') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col pr-0">
                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <textarea class="form-control" name="message" rows="7" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn send text-uppercase px-5">submit now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection