require('./bootstrap');

window.Vue = require('vue');

// imported packages

import moment from 'moment';
import VueProgressBar from 'vue-progressbar'
import VueRouter from 'vue-router'
import Swal from 'sweetalert2'
import {
    Form,
    HasError,
    AlertError
} from 'vform';

//gobal declaration for vue form
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// Initialize vue router and register
Vue.use(VueRouter)
let routes = [{
        path: '/dashboard',
        component: require('./components/Dashboard.vue').default
    },
    {
        path: '/category',
        component: require('./components/Category.vue').default
    },
    {
        path: '/items',
        component: require('./components/Items.vue').default
    },
    {
        path: '/developer',
        component: require('./components/Developer.vue').default
    },
    {
        path: '*',
        component: require('./components/Error.vue').default
    },
]

const router = new VueRouter({
    mode: 'history', //HTML5 History mode
    routes // short for `routes: routes`
})

// Using filters and formating 
Vue.filter('ucFirst', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
})
Vue.filter('dFormat', function (date) {
    return moment().format("MMMM Do YYYY");
})

//Useing vue progress bar

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
})
// Using Sweet alert
window.Swal = Swal
//sweet alert toaster
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//components of laravel passport

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    router //using router
});
