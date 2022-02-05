/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
import VueMeta from 'vue-meta'
import VueToast from 'vue-toast-notification';
import App from './App.vue'
import router from './router'
import store from './store'
import moment from 'moment';
// import SocketIO from 'socket.io-client';
// import VueSocketIO from 'vue-socket.io';
import { setHeaderToken } from './utils/auth';

// export const SocketInstance = socketio.connect('http://localhost:3000')

import 'bootstrap'
// import 'bootstrap-icons/font/bootstrap-icons.css'

Vue.config.productionTip = false

// Comment this if production mode
Vue.config.devtools = false
Vue.config.debug = false
Vue.config.silent = true

Vue.prototype.$base_url = 'http://dailyreport.test'
Vue.prototype.moment = moment

const token = localStorage.getItem('X-STMIK-TOKEN')

if(token) {
  setHeaderToken(token)
}

Vue.use(VueMeta)
Vue.use(VueToast, {
  position: 'top-right'
})
// Vue.use(new VueSocketIO( {
//   debug: true,
//   connection: SocketIO('http://localhost:3000')
// }))

store.dispatch('get_user', token)
  .then(() => {
    new Vue({
      router,
      store,
      render: h => h(App)
    }).$mount('#app');
  })
  .catch((error) => {
    console.error(error)
  })