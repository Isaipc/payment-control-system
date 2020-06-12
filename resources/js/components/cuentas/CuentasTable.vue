<template>
    <div>
        <h2 class="subtitle">Catalogos</h2>
        <h1 class="title">{{ tipoCuenta }}</h1>

        <cuenta-form id="cuenta-form" @save="addCuenta"></cuenta-form>
        <br />

        <div class="notification is-info is-light" v-if="isEmpty">No hay registros</div>

        <div class="table-container" v-else>
            <div class="table-container">
                <table class="table is-bordered is-striped is-hoverable is-narrow">
                    <thead class="is-uppercase">
                        <th>id</th>
                        <th>nombre</th>
                        <th>creado</th>
                        <th>actualizado</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(cuenta, index) in cuentas"
                            :key="index"
                            :class="{ 'is-selected': index == currentIndex }"
                            @click="setActiveCuenta(cuenta, index)"
                        >
                            <th>{{ cuenta.id }}</th>
                            <td>{{ cuenta.nombre }}</td>
                            <td>{{ cuenta.created_at }}</td>
                            <td>{{ cuenta.updated_at }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <router-link
                                        :to="{name: 'edit', params: { id: cuenta.id }}"
                                        class="button is-primary"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </router-link>
                                    <button
                                        class="button is-danger"
                                        @click="deleteCuenta(cuenta.id)"
                                    >
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import CuentaForm from "./CuentaForm";
import TiposCuentaDataService from "../../services/TiposCuentaDataService";
import CuentaDataService from "../../services/CuentaDataService";
import axios from "axios";

export default {
    data() {
        return {
            cuentas: [],
            currentCuenta: null,
            currentIndex: -1,
            tipoCuenta: null
        };
    },
    computed: {
        isEmpty() {
            return this.cuentas.length == 0;
        }
    },
    components: {
        CuentaForm
    },
    methods: {
        addCuenta(cuenta) {
            CuentaDataService.create(this.$route.params.id, cuenta)
                .then(response => {
                    console.log(response);
                    this.refresh();
                })
                .catch(error => {
                    console.log(error);
                });
        },
        // deleteCuenta(id) {
        //     CuentaDataService.delete(id)
        //         .then(response => {
        //             this.cuentas = response.data.data;
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // },

        fillCuentasTable() {
            CuentaDataService.getAll(this.$route.params.id)
                .then(response => {
                    this.cuentas = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        // updateCuenta(id) {
        //     CuentaDataService.delete(id)
        //         .then(response => {
        //             this.cuentas = response.data.data;
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // },

        refresh() {
            this.fillCuentasTable();
            this.setActiveCuenta(null, -1);
            this.setTipoCuenta();
        },

        setActiveCuenta(cuenta, index) {
            this.currentCuenta = cuenta;
            this.currentIndex = index;
        },
        setTipoCuenta() {
            TiposCuentaDataService.get(this.$route.params.id)
                .then(response => {
                    this.tipoCuenta = response.data.data.nombre;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.refresh();
    },
    watch: {
        $route(newValue, oldValue) {
            this.refresh();
        }
    }
};
</script>
