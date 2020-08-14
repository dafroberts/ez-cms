window.axios = require('axios');

var halfmoon = require("halfmoon");
halfmoon.onDOMContentLoaded();

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

// Register components
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });
