/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
// import VueRouter from 'vue-router'
import VueQrcodeReader from "vue-qrcode-reader";

// Vue.use(VueRouter)
Vue.use(VueQrcodeReader);

import Reader from './components/QReader.vue'
import {
    create
} from 'lodash';

// const routes = [{
//     path: '/admin/booking',
//     component: Reader
// }]

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('qr-check', Reader)

// const router = new VueRouter({
//     routes
// })

const app = new Vue({
    // router
}).$mount('#app')

// javascript
const src = document.getElementById('src-company')
if (src) {
    src.addEventListener('keyup', function () {
        let arng = document.querySelectorAll('.rng--24s')
        if (arng) {
            arng.forEach(e => {
                e.remove()
            })
        }
        axios.get('/api/json/company?src=' + this.value).then(res => {
            if (res.status === 200) {
                if (this.value == '') {
                    arng.forEach(e => {
                        e.remove()
                    })
                } else {
                    res.data.rss.forEach(e => {
                        createElement(e)
                    });
                }
            }
        }).catch(err => {
            console.log(err)
        })
    })
}

function createElement(e) {
    let createRow = document.createElement('div')
    createRow.setAttribute('class', 'row rng--24s justify-content-center')
    let createColumn = document.createElement('div')
    createColumn.setAttribute('class', 'col-xl-6 col-lg-6 col-md-12 col-sm-12')
    let createCard = document.createElement('div')
    createCard.setAttribute('class', 'card shadow-sm')
    let createRowCard = document.createElement('div')
    createRowCard.setAttribute('class', 'row no-gutters')
    let createColumnCard4 = document.createElement('div')
    createColumnCard4.classList.add('col-md-4')
    let createColumnCard8 = document.createElement('div')
    createColumnCard8.classList.add('col-md-8')
    let createCardBody = document.createElement('div')
    createCardBody.classList.add('card-body')
    let createCardTitle = document.createElement('h5')
    createCardTitle.classList.add('card-title')
    let createCardText = document.createElement('p')
    createCardText.classList.add('card-text')
    let createCardTextSmall = document.createElement('small')
    createCardTextSmall.classList.add('text-small')

    let createImg = document.createElement('img')
    createImg.setAttribute('class', 'card-img p-2')
    createImg.setAttribute('style', 'height:250px')
    createImg.setAttribute('src', '/img/draumastofa.jpg')
    createColumnCard4.appendChild(createImg)

    createCardTitle.textContent = 'Draumastofa'
    createCardText.textContent = e.address
    createCardTextSmall.textContent = e.city

    createRow.append(createColumn)
    createColumn.append(createCard)
    createCard.append(createRowCard)
    createRowCard.append(createColumnCard4, createColumnCard8)
    createColumnCard8.appendChild(createCardBody)
    createCardBody.append(createCardTitle, createCardText, createCardTextSmall)

    const getElementResult = document.querySelector('.res-company')
    getElementResult.appendChild(createRow)
}
