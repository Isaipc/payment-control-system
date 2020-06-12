
import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';

Vue.use(VueRouter);

// Router
const router = new VueRouter({
    // base: '/',
    mode: 'history',
    linkActiveClass: 'is-active',
    routes : [
        {
            path: '/test',
            name: 'test',
            component: () => import('./components/Test')
        },
        {
            path: '/',
            name: 'home',
            component: () => import('./components/Dashboard')
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('./components/Login')
        },
        {
            path: '/logout',
            name: 'logout',
            component: () => import('./components/Logout'),
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: () => import('./components/Dashboard'),
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/404',
            name: '404',
            component: () => import('./components/NotFound'),
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
        {
            name: 'personas',
            path: '/categorias/:id/personas',
            component: () => import('./components/personas/PersonasTable'),
        },
        {
            name: 'cuentas',
            path: '/tipos-cuenta/:id/cuentas',
            component: () => import('./components/cuentas/CuentasTable'),
        },
    ]
});

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
});

export default router;
