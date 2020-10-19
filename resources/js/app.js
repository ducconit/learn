require('./bootstrap');
import Vue from 'vue';
import App from './App.vue';
import {router} from './routes.js';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

//use bootstrap
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);





const app = new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
