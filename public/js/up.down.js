const size = document.querySelector('#size')
const capacity = document.querySelector('#capacity')

size.readOnly = true
capacity.readOnly = true

if (size.value == 1) {
    document.querySelector('.cr-down').disabled = true
}

if (capacity.value == 1) {
    document.querySelector('.sr-down').disabled = true
}

document.querySelector('.sr-up').addEventListener('click', () => {
    if (size.value >= 1) {
        document.querySelector('.sr-down').disabled = false
    }
    up(size)
})

document.querySelector('.sr-down').addEventListener('click', function () {
    down(size)
    if (size.value == 1) {
        this.disabled = true
    }
})

document.querySelector('.cr-up').addEventListener('click', () => {
    if (capacity.value >= 1) {
        document.querySelector('.cr-down').disabled = false
    }
    up(capacity)
})

document.querySelector('.cr-down').addEventListener('click', function () {
    down(capacity)
    if (capacity.value == 1) {
        this.disabled = true
    }
})

function up(e) {
    e.value = parseInt(e.value) + 1
}

function down(e) {
    e.value = parseInt(e.value) - 1
}
