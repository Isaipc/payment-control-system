<template>
    <div>
        <Navbar></Navbar>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <aside class="menu column is-3" v-show="loggedIn">
                        <p class="menu-label is-danger">General</p>
                        <ul class="menu-list">
                            <li>
                                <router-link to="/dashboard" class>Panel de control</router-link>
                            </li>
                            <li>
                                <a
                                    href="#categoria-menu"
                                    class="is-active"
                                    data-action="collapse"
                                >Catalogos</a>
                                <menu-list-items id="categoria-menu" class="is-collapsible"></menu-list-items>
                            </li>
                        </ul>
                        <p class="menu-label">Transacciones</p>
                        <ul class="menu-list">
                            <li>
                                <a>Historial de pagos</a>
                            </li>
                            <li>
                                <!-- <a>Transferencias</a> -->
                            </li>
                            <li>
                                <!-- <a>Balance</a> -->
                            </li>
                        </ul>
                        <p class="menu-label">Informes</p>
                        <ul class="menu-list">
                            <li>
                                <a>Pagos</a>
                            </li>
                            <li>
                                <a>Transferencias</a>
                            </li>
                            <li>
                                <a>Balance</a>
                            </li>
                        </ul>
                        <p class="menu-label">Cuenta</p>
                        <ul class="menu-list">
                            <li>
                                <router-link to="/logout" class="has-text-danger">Cerrar sesión</router-link>
                            </li>
                        </ul>
                        <p class="menu-label">Test</p>
                        <ul class="menu-list">
                            <li>
                                <router-link to="/test">Test</router-link>
                            </li>
                        </ul>
                    </aside>
                    <div class="column">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import MenuListItems from "./MenuListItems";
import Navbar from "./Navbar";

export default {
    data() {
        return {
            loggedIn: false,
        };
    },
    components: {
        MenuListItems,
        Navbar
    },
    created() {
        this.loggedIn = this.$store.getters.loggedIn;
    }
};
</script>
