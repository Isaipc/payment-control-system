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
            <persona-form :group="nombreGroup" :init-persona="currentItem" @save="saveItem"></persona-form>
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
            :narrowed="true"
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
                >{{ props.row.id }}</b-table-column>
                <b-table-column
                    field="nombre"
                    label="Nombre"
                    sortable
                    :searchable="isSearchable"
                >{{ props.row.nombre }}</b-table-column>
                <b-table-column
                    field="apellidos"
                    label="Apellidos"
                    sortable
                    :searchable="isSearchable"
                >{{ props.row.apellidos }}</b-table-column>
                <b-table-column field="telefono" label="Telefono" sortable>{{ props.row.telefono }}</b-table-column>
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
                    <button class="button is-primary" @click="editItem(props.row)">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="button is-danger" @click="deleteItem(props.row)">
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
import ItemDataService from "../../services/PersonaDataService";
import GroupDataService from "../../services/CategoriaDataService";

function defaultItem() {
    return {
        id: -1,
        nombre: "",
        apellidos: "",
        telefono: "",
        direccion: "",
        rfc: "",
        hora_entrada: "",
        hora_salida: "",
        nacimiento: "",
        pago_fijo: "",
        es_nadador_indie: "",
        puesto: "",
        categoria_id: ""
        // created_user_id: "",
        // updated_user_id: ""
    };
}

function defaultGroup() {
    return {
        nombre: "Beneficiario"
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
        nombreGroup() {
            return this.group.nombre.toLowerCase().slice(0, -1);
        }
    },
    components: {
        PersonaForm: () =>import('./PersonaForm')
    },
    methods: {
        newItem() {
            this.configForm(new defaultItem(), true);
        },

        editItem(item) {
            this.configForm(item, true);
        },

        saveItem(item) {
            console.log(item);
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
                title: `Borrar ${this.group.nombre}`,
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
                    this.group = defaultGroup;
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
