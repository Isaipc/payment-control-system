<template>
    <div>
        <h2 class="subtitle">Catalogos</h2>
        <h1 class="title">{{ tipoCuenta }}</h1>

        <b-modal
            :active.sync="isModalActive"
            has-modal-card
            trap-focus
            :destroy-on-hide="false"
            aria-role="dialog"
            aria-modal
        >
            <cuenta-form id="cuenta-form" @save="addCuenta"></cuenta-form>
        </b-modal>

        <div class="colums">
            <button class="button is-primary" @click="isModalActive = true">Agregar</button>
        </div>
        <br />
        <br />

        <b-table
            :data="cuentas"
            :striped="true"
            :hoverable="true"
            :selected.sync="currentCuenta"
            :paginated="isPaginated"
            :per-page="perPage"
        >
            <template slot-scope="props">
                <b-table-column field="id" label="Id" sortable numeric>{{ props.row.id }}</b-table-column>
                <b-table-column field="nombre" label="Nombre" sortable>{{ props.row.nombre }}</b-table-column>
                <b-table-column
                    field="created_at"
                    label="Creado"
                    sortable
                >{{ props.row.created_at }}</b-table-column>
                <b-table-column
                    field="updated_at"
                    label="Actualizado"
                    sortable
                >{{ props.row.updated_at }}</b-table-column>
                <b-table-column>
                    <button class="button is-primary" @click="editCuenta(props.row)">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="button is-danger" @click="deleteCuenta(props.row)">
                        <i class="fas fa-times"></i>
                    </button>
                </b-table-column>
            </template>
        </b-table>
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
            tipoCuenta: null,
            isModalActive: false,
            isPaginated: true,
            perPage: 5
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
                    this.isModalActive = false;
                    this.fillCuentasTable();
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        editCuenta(cuenta) {
            this.isModalActive = true;
        },
        updateCuenta(cuenta) {
            // CuentaDataService.update(id, this.currentCuenta)
            //     .then(response => {
            //         this.cuentas = response.data.data;
            //     })
            //     .catch(error => {
            //         console.log(error);
            //     });
        },
        deleteCuenta(cuenta) {
            this.$buefy.dialog.confirm({
                title: "Borrar concepto",
                message: `¿Estas seguro que desea borrar <b> ${cuenta.nombre}</b>? Esta acción no se puede revertir.`,
                confirmText: "Borrar",
                cancelText: "Cancelar",
                type: "is-danger",
                hasIcon: true,
                onConfirm: () => {
                    CuentaDataService.delete(cuenta.id)
                        .then(response => {
                            this.fillCuentasTable();
                            this.$buefy.toast.open("Borrado completado");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            });
        },

        fillCuentasTable() {
            CuentaDataService.getAll(this.$route.params.id)
                .then(response => {
                    this.cuentas = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

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
