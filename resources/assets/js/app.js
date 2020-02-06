
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap')
import Vue from 'vue'
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

Vue.use(Buefy)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('site-navbar', require('./components/SiteNavbar.vue'))
Vue.component('site-footer', require('./components/SiteFooter.vue'))
Vue.component('notification', require('./components/common/Notification.vue'))
Vue.component('home-page', require('./components/home/HomePage.vue'))
Vue.component('category-posts', require('./components/posts/CategoryPosts.vue'))
Vue.component('post-detail', require('./components/posts/PostDetail.vue'))
Vue.component('contacts', require('./components/home/Contacts.vue'))

const app = new Vue({
    el: '#app'
})
