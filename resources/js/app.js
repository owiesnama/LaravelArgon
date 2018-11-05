/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./argon');
window.Vue = require('vue');


import Instantsearch from 'vue-instantsearch'

Vue.use(Instantsearch)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('instantSearch', require('./components/InstantSearch.vue'))

/*
 * Next, we will import all our vue inline templates
 * and we will refere to it as views
 */
Vue.component('ProfileView',require('./views/ProfileView.vue'))

const app = new Vue({
    el: '#app'
});
