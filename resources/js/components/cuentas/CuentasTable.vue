<template>
    <div>
        <h2 class="subtitle">Catalogos</h2>
        <h1 class="title">{{ tipoCuenta.nombre }}</h1>

        <b-modal
            :active.sync="isModalActive"
            has-modal-card
            trap-focus
            :destroy-on-hide="true"
            aria-role="dialog"
            aria-modal
        >
            <cuenta-form :title="nombreTipoCuenta" :init-cuenta="currentCuenta" @save="saveCuenta"></cuenta-form>
        </b-modal>

        <b-field grouped group-multiline>
            <div class="control">
                <b-button icon-left="plus" class="is-primary" @click="newCuenta">Agregar</b-button>
            </div>
            <div class="control">
                <b-select v-model="perPage" :disabled="!isPaginated">
                    <option
                        v-for="(item, index) in perPageList"
                        :key="index"
                        :value="item"
                    >{{ item }} por página</option>
                </b-select>
            </div>
            <div class="control">
                <b-switch v-model="isSearchable">Realizar búsqueda</b-switch>
            </div>
        </b-field>

        <b-table
            :data="cuentas"
            :striped="true"
            :hoverable="true"
            :selected.sync="currentCuenta"
            :paginated="isPaginated"
            :per-page="perPage"
            :pagination-position="paginationPosition"
        >
            <template slot-scope="props">
                <b-table-column
                    field="id"
                    label="Id"
                    sortable
                    numeric
                    width="100"
                    :searchable="isSearchable"
                >{{ props.row.id }}</b-table-column>
                <b-table-column
                    field="nombre"
                    label="Nombre"
                    sortable
                    :searchable="isSearchable"
                >{{ props.row.nombre }}</b-table-column>
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
            <template slot="empty">
                <section class="section">
                    <div class="notification is-info is-light has-text-centered">
                        <p>
                            <b-icon icon="frown" size="is-large"></b-icon>
                        </p>
                        <p>No hay registros</p>
                    </div>
                </section>
            </template>
        </b-table>
    </div>
</template>

<script>
import CuentaForm from "./CuentaForm";
import TiposCuentaDataService from "../../services/TiposCuentaDataService";
import CuentaDataService from "../../services/CuentaDataService";

const defaultData = {
    id: -1,
    nombre: ""
};

export default {
    data() {
        return {
            cuentas: [],
            tipoCuenta: {
                nombre: ""
            },
            currentCuenta: defaultData,
            isModalActive: false,
            isPaginated: true,
            isSearchable: false,
            perPageList: [5, 10, 15, 20],
            perPage: 5,
            paginationPosition: "bottom"
        };
    },
    computed: {
        isEmpty() {
            return this.cuentas.length == 0;
        },
        nombreTipoCuenta() {
            return this.tipoCuenta.nombre.toLowerCase().slice(0, -1);
        }
    },
    components: {
        CuentaForm
    },
    methods: {
        newCuenta() {
            this.clearForm(true);
        },

        editCuenta(cuenta) {
            this.currentCuenta = cuenta;
            this.isModalActive = true;
        },

        saveCuenta(cuenta) {
            if (cuenta.id == -1) {
                CuentaDataService.create(this.$route.params.id, cuenta)
                    .then(response => {
                        this.clearForm(false);
                        this.$buefy.toast.open("Guardado completado");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                CuentaDataService.update(cuenta.id, cuenta)
                    .then(response => {
                        this.clearForm(false);
                        this.$buefy.toast.open("Guardado completado");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
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
            this.setTipoCuenta();
            this.clearForm(false);
        },

        setTipoCuenta() {
            TiposCuentaDataService.get(this.$route.params.id)
                .then(response => {
                    this.tipoCuenta = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        clearForm(isModalActive) {
            this.fillCuentasTable();
            this.currentCuenta = defaultData;
            this.isModalActive = isModalActive;
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
