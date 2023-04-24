
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueRouter from 'vue-router'
import Routes from './route'
import VueAxios from 'vue-axios'
import axios from 'axios'




window.Vue = require('vue');
Vue.use (VueRouter);
Vue.use( VueAxios,axios);

const router = new VueRouter({
	routes: Routes,
    base: '/',
    mode: 'history',
    history: true
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('war-upstream', require('./components/WAR_Upstream.vue'));
Vue.component('war-gas', require('./components/WAR_Gas.vue'));
Vue.component('war-downstream', require('./components/WAR_Downstream.vue'));
Vue.component('war-engineering-standand', require('./components/WAR_Engineering_standand.vue'));
Vue.component('war-shec', require('./components/WAR_Shec.vue'));
Vue.component('war-corporate-service', require('./components/WAR_Corporate_services.vue'));
Vue.component('war-fad-tax-matters', require('./components/WAR_FAD_Tax_matters.vue'));
Vue.component('war-public-affairs', require('./components/WAR_PAU.vue'));
Vue.component('monthly-reporting-UPSTREAM', require('./components/Monthly_Reporting_UPSTREAM.vue'));
Vue.component('monthly-reporting-DOWNSTREAM', require('./components/Monthly_Reporting_DOWNSTREAM.vue'));
Vue.component('monthly-reporting-GAS', require('./components/Monthly_Reporting_GAS.vue'));
Vue.component('monthly-reporting-Engineering-and-Standand', require('./components/Monthly_Reporting_Engineering_and_Standand.vue'));
Vue.component('monthly-reporting-health-safety-environment', require('./components/Monthly_Reporting_Health_Safety_Environment.vue'));
Vue.component('monthly-reporting-corporate-services', require('./components/Monthly_Reporting_CORPORATE_SERVICES.vue'));
Vue.component('monthly-reporting-FAD-Tax-matters', require('./components/Monthly_Reporting_FAD_TAX.vue'));
Vue.component('monthly-reporting-Public-affair-units', require('./components/Monthly_Reporting_PUBLIC_AFFAIR.vue'));

Vue.component('UpstreamExcelExport', require('./components/UpstreamExcelExport.vue'));
Vue.component('check-auth',require('./components/WAR_CheckAuthComponent.vue'));



const app = new Vue({
    el: '#app',
    router: router
});
