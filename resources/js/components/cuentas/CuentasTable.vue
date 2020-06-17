<template>
    <div>
        <h2 class="subtitle">Catalogos</h2>
        <h1 class="title">{{ group.nombre }}</h1>

        <b-modal
            :active.sync="isModalActive"
            has-modal-card
            trap-focus
            :destroy-on-hide="true"
            aria-role="dialog"
            aria-modal
        >
            <cuenta-form :title="title" :init-cuenta="currentItem" @save="saveItem"></cuenta-form>
        </b-modal>

        <b-field grouped group-multiline>
            <div class="control">
                <b-button icon-left="plus" class="is-primary" @click="newItem">Agregar</b-button>
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
            :data="items"
            :striped="true"
            :hoverable="true"
            :selected.sync="currentItem"
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
                >
                    <span class="has-text-weight-bold">{{ props.row.id }}</span>
                </b-table-column>
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
                >{{ new Date(props.row.created_at).toLocaleDateString() }}</b-table-column>
                <b-table-column
                    field="updated_at"
                    label="Actualizado"
                    sortable
                >{{ new Date(props.row.updated_at).toLocaleDateString() }}</b-table-column>
                <b-table-column>
                    <b-button type="is-success" icon-left="pen" @click="editItem(props.row)"></b-button>
                    <b-button type="is-danger" icon-left="times" @click="deleteItem(props.row)"></b-button>
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
import GroupDataService from "../../services/TiposCuentaDataService";
import ItemDataService from "../../services/CuentaDataService";

function defaultItem() {
    return {
        id: -1,
        nombre: ""
    };
}

function defaultGroup() {
    return {
        id: -1,
        nombre: ""
    };
}

export default {
    data() {
        return {
            items: [],
            group: new defaultGroup(),
            currentItem: null,
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
            return this.items.length == 0;
        },
        title() {
            return this.group.nombre.toLowerCase().slice(0, -1);
        }
    },
    components: {
        CuentaForm: () => import("./CuentaForm")
    },
    methods: {
        newItem() {
            this.configForm(new defaultItem(), true);
        },

        editItem(item) {
            this.configForm(Object.assign({}, item), true);
        },

        saveItem(item) {
            if (item.id == -1) {
                ItemDataService.create(this.$route.params.id, item)
                    .then(response => {
                        this.fillTable();
                        this.configForm(new defaultItem(), false);
                        this.$buefy.toast.open("Guardado completado");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                ItemDataService.update(item.id, item)
                    .then(response => {
                        this.fillTable();
                        this.configForm(new defaultItem(), false);
                        this.$buefy.toast.open("Guardado completado");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },

        deleteItem(item) {
            this.$buefy.dialog.confirm({
                title: "Borrar concepto",
                message: `¿Estas seguro que desea borrar <b> ${item.nombre}</b>? Esta acción no se puede revertir.`,
                confirmText: "Borrar",
                cancelText: "Cancelar",
                type: "is-danger",
                hasIcon: true,
                onConfirm: () => {
                    ItemDataService.delete(item.id)
                        .then(response => {
                            this.fillTable();
                            this.$buefy.toast.open("Borrado completado");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            });
        },

        fillTable() {
            ItemDataService.getAll(this.$route.params.id)
                .then(response => {
                    this.items = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        refresh() {
            this.fillTable();
            this.setGroup();
            this.configForm(new defaultItem(), false);
        },

        setGroup() {
            GroupDataService.get(this.$route.params.id)
                .then(response => {
                    this.group = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        configForm(item, isModalActive) {
            this.currentItem = item;
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
