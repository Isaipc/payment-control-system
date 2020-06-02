
require('./bootstrap');
window.Vue = require('vue');

import App from './components/App.vue';
import router from './router';
import store from './store';
import bulmaCollapsible from '@creativebulma/bulma-collapsible';

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!store.getters.loggedIn) {
            next({
                name: 'login',
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
    render: h => h(App),
    mounted() {
        const collapsibles = bulmaCollapsible.attach();
    }
});


$((e) => {
    $('#sidebar-collapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
    });
});
