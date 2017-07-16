try {
  window.$ = window.jQuery = require('jquery');
} catch(e) {}

require('bootstrap');
require('pace');
require('tether');
import Chart from 'chart.js';

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);
Vue.use(require('vue-resource'));

const router = new VueRouter({
    routes: require('./routes.js')
});

const app = new Vue({
    router,
    data: {
        url_base: 'http://app.dev',
    },
    components: {
        'loader': require('./components/Loader.vue'),
    }
}).$mount('#app');