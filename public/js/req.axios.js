function axiosPost() {
    const prefix = $('.count').data('prefix')
    axios.post('/likes', {
        like: prefix
    }).then(res => {}).catch(err => {
        console.log(err)
    })
}

function like() {
    $('.count').text(parseInt($('.count').text()) + 1)
    $('.fa-heart').attr({
        'data-prefix': 'far',
        'onclick': 'dislike()'
    })
    axiosPost()
}

function dislike() {
    $('.count').text(parseInt($('.count').text()) - 1)
    $('.fa-heart').attr({
        'data-prefix': 'fas',
        'onclick': 'like()'
    })
    axiosPost()
}
