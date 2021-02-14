
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.config.devtools = true;
Vue.config.performance = true;

import App from './App.vue';
import VueRouter from 'vue-router';
import {routes} from './routes';

Vue.component('pagination', require('laravel-vue-pagination'));
 
Vue.use(VueRouter);
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
});
