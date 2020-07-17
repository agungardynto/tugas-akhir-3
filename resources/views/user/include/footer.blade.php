<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                Copyright © 2020 {{ env('APP_NAME') }}. All Rights Reserved.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="#support" data-toggle="modal" class="support">Support</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="support" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave a message for us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ action('UserController@send_message') }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    $('.support').click(function(e) {
        e.preventDefault();
        $('.modal').addClass('show')
        $('.modal').attr('style', 'display: block;');
        $('.modal').removeAttr('aria-hidden');
    })
</script>
@endpush