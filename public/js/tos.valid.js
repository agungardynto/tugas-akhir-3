const terms = document.querySelector('.terms')
terms.addEventListener('click', function () {
    if (this.checked === true) {
        terms.classList.add('is-valid')
        terms.classList.remove('is-invalid')
    } else {
        terms.classList.add('is-invalid')
        terms.classList.remove('is-valid')
    }
})
document.querySelector('button').addEventListener('click', e => {
    if (terms.checked === true) {
        document.querySelector('form').submit
    } else {
        e.preventDefault()
        terms.classList.add('is-invalid')
        terms.classList.remove('is-valid')
    }
})
