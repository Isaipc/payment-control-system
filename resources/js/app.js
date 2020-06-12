
require('./bootstrap');
require('@fortawesome/fontawesome-free');

window.Vue = require('vue');

import App from './components/App.vue';
import router from './router';
import store from './store';
import bulmaCollapsible from '@creativebulma/bulma-collapsible';
import { ConfigProgrammatic, Modal} from 'buefy';
import 'buefy/dist/buefy.css';

Vue.config.productionTip = false;
Vue.use(Modal);

ConfigProgrammatic.setOptions({
    defaultIconPack: 'fas',
    // defaultContainerElement: '#content'
});


const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
    // render: h => h(App),
    mounted() {
        const collapsibles = bulmaCollapsible.attach();
    }
});


$((e) => {

    $('.modal .input').keydown( f => {
        console.log(f);
        // $(".modal").removeClass("is-active");
    });
});
