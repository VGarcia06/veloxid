/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import router from './routes'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('dashboard', require('./components/DashboardComponent.vue').default);
Vue.component('lateralmenu', require('./components/LateralMenuComponent.vue').default);
Vue.component('vehicle', require('./components/VehicleComponent.vue').default);
Vue.component('driver', require('./components/DriverComponent.vue').default);
Vue.component('evaluation', require('./components/EvaluationComponent.vue').default);
Vue.component('cotization', require('./components/CotizationComponent.vue').default);
Vue.component('tracking', require('./components/TrackingComponent.vue').default);
Vue.component('revision', require('./components/RevisionHistoryComponent.vue').default);
Vue.component('revisiondetail', require('./components/RevisionDetailComponent.vue').default);
Vue.component('orderconfirmation', require('./components/OrderConfirmationComponent.vue').default);
Vue.component('order', require('./components/OrdersComponent.vue').default);
Vue.component('request', require('./components/RequestComponent.vue').default);
Vue.component('cotizacion-request', require('./components/CotizacionRequestComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
