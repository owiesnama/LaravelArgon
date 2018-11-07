/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('chart.js/dist/Chart');
require('./argon');

window.Vue = require('vue');

/**
 * Register our algolia instant search wrapper
 * globally so we can reference it anywhere
 */
import Instantsearch from 'vue-instantsearch'
Vue.use(Instantsearch)

/**
 * Register our croppa plugin globally,
 * its a image uploader component
 */

import Croppa from 'vue-croppa'
Vue.use(Croppa)

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
Vue.component('ProfileView', require('./pages/ProfileView.vue'))

const app = new Vue({
    el: '#app'
});
