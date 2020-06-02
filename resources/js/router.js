
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Pages
import NotFound from './components/NotFound'
import Login from './components/Login'
import Logout from './components/Logout'
import Dashboard from './components/Dashboard'


// Router
const router = new VueRouter({
    // base: '/',
    mode: 'history',
    linkActiveClass: 'is-active',
    routes : [
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/404',
            name: '404',
            component: NotFound,
        },
        {
            path: '*',
            redirect: '/404',
        },
        // {
        //     name: 'home',
        //     path: '/',
        //     component: Home
        // },
        // {
        //     name: 'categorias',
        //     path: '/categorias',
        //     component: CategoriaList
        // },
        // {
        //     name: 'empleados',
        //     path: '/empleados',
        //     component: Empleados
        // },
        // {
        //     name: 'clientes',
        //     path: '/clientes',
        //     component: Clientes
        // },
        // {
        //     name: 'tipos-cuentas',
        //     path: '/tipos-cuentas',
        //     component: TiposCuentaList
        // },
        // {
        //     name: 'cuentas',
        //     path: '/cuentas',
        //     component: CuentaList
        // }
    ]
});

export default router;
