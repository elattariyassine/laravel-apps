require('./bootstrap');
window.Vue = require('vue');

Vue.component('follow-button', require('./components/FollowButton.vue').default);

const app = new Vue({
    el: '#app',
});