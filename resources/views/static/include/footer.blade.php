<div class="d-flex justify-content-center align-items-center rounded-circle bg-success position-fixed" style="width: 50px; height: 50px; right: 1%; bottom: 2%; z-index: 2">
    <a href="https://api.whatsapp.com/send?phone=+6282179099557" target="_blank" style="color: #ffffff" class="mt-1">
        <i class="fab fa-2x fa-whatsapp"></i>
    </a>
</div>
<footer id="footer" class="mt-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-3">
                <a href="/" class="footer-brand">{{ env('APP_NAME') }}<span>.</span></a>
                <p>We inspire and reach millions of travelers across 90 local websites</p>
                <div class="social-contact mb-3">
                    <a href="https://www.facebook.com/agungd3v/" target="_blank" class="mr-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="mr-3">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="mr-3">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="mr-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="mr-3">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <small style="color: #ffffff">Copyright &copy; {{ env('APP_NAME') }}. All Rights Reserved.</small>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-3">
                <h6 class="text-uppercase">contact us</h6>
                <p>{{ $contact->phone }} {{ $contact->email }} {{ $contact->address }}</p>
            </div>
        </div>
    </div>
</footer>