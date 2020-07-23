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
