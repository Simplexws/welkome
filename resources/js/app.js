/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('room-list', require('./components/Room/RoomList.vue').default);

import VueRouter from 'vue-router';
import Permissions from './mixins/Permissions';
import BootstrapVue from 'bootstrap-vue';

Vue.mixin(Permissions);

Vue.use(VueRouter);
Vue.use(BootstrapVue);

const router = new VueRouter({
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router: router
});