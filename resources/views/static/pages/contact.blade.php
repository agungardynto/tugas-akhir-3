@extends('static.app')
@section('content')
<section id="contact" class="my-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <h3 style="color: var(--pink);">Contact Info</h3>
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quam dolor
                    molestiae,
                    aspernatur doloremque omnis dolore delectus.</p>
                <table cellpadding="10">
                    <tr valign="top">
                        <td>Address:</td>
                        <td>856 Cordia Extension Apt. 356, Lake, US</td>
                    </tr>
                    <tr valign="top">
                        <td>Phone:</td>
                        <td>(12) 345 67890</td>
                    </tr>
                    <tr valign="top">
                        <td>Email:</td>
                        <td>example@example.example</td>
                    </tr>
                    <tr valign="top">
                        <td>Fax:</td>
                        <td>+(12) 345 67890</td>
                    </tr>
                </table>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                <form>
                    <div class="row">
                        <div class="col pr-0">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <textarea class="form-control" rows="7" placeholder="Message"></textarea>
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