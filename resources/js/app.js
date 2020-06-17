
require('./bootstrap');
require('@fortawesome/fontawesome-free');

window.Vue = require('vue');

import App from './components/App.vue';
import router from './router';
import store from './store';
import bulmaCollapsible from '@creativebulma/bulma-collapsible';
import { ConfigProgrammatic, Modal, Field, Input, Numberinput, Dialog, Toast, Table, Select, Icon, Checkbox, Button, Switch, Datepicker, Timepicker } from 'buefy';
import 'buefy/dist/buefy.css';

Vue.config.productionTip = false;
Vue.use(Modal);
Vue.use(Field);
Vue.use(Input);
Vue.use(Numberinput);
Vue.use(Dialog);
Vue.use(Toast);
Vue.use(Table);
Vue.use(Select);
Vue.use(Icon);
Vue.use(Checkbox);
Vue.use(Button);
Vue.use(Switch);
Vue.use(Datepicker);
Vue.use(Timepicker);
Vue.use(require('vue-moment'));

ConfigProgrammatic.setOptions({
    defaultIconPack: 'fas',
    // defaultDateFormatter: Date.UTC(date)
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

    $('.modal .input').keydown(f => {
        console.log(f);
        // $(".modal").removeClass("is-active");
    });
});
