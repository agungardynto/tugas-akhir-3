$('input').hover(function () {
    $(this, '[data-toggle="tooltip"]').tooltip('show')
})
$('select').hover(function () {
    $(this, '[data-toggle="tooltip"]').tooltip('show')
})
$('input').focus(function () {
    $(this).tooltip('dispose')
    $(this).removeAttr('data-toggle data-placement title data-original-title aria-describedby')
    $(this).removeClass('is-invalid')
})
$('select').focus(function () {
    $(this).tooltip('dispose')
    $(this).removeAttr('data-toggle data-placement title data-original-title aria-describedby')
    $(this).removeClass('is-invalid')
})

if ($(window).width() <= 768) {
    $('input').on('touchstart', function () {
        $(this, '[data-toggle="tooltip"]').tooltip('show')
    })
    $('input').each(function () {
        $(this).attr('data-placement', 'left');
    })
    $('select').on('touchstart', function () {
        $(this, '[data-toggle="tooltip"]').tooltip('show')
    })
}
