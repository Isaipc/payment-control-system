<template>
    <div>
        <h2 class="subtitle">Catalogos</h2>
        <h1 class="title">{{ categoria.nombre }}</h1>

        <b-modal
            :active.sync="isModalActive"
            has-modal-card
            trap-focus
            :destroy-on-hide="false"
            aria-role="dialog"
            aria-modal
        >
            <persona-form id="persona-form" @save="addPersona" :categoria="nombreCategoria"></persona-form>
        </b-modal>

        <b-field grouped group-multiline>
            <div class="control">
                <b-button icon-left="plus" class="is-primary" @click="isModalActive = true">Agregar</b-button>
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
            :data="personas"
            :striped="true"
            :narrowed="true"
            :hoverable="true"
            :selected.sync="currentPersona"
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
                <!-- <b-table-column
                    field="horario_entrada"
                    label="Hora entrada"
                    sortable
                    v-if="categoria.nombre === 'Empleados'"
                >{{ props.row.horario_entrada }}</b-table-column>
                <b-table-column
                    field="horario_salida"
                    label="Hora salida"
                    sortable
                    v-if="categoria.nombre === 'Empleados'"
                >{{ props.row.horario_salida }}</b-table-column>-->
                <b-table-column>
                    <button class="button is-primary" @click="editPersona(props.row)">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="button is-danger" @click="deletePersona(props.row)">
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
import PersonaForm from "./PersonaForm";
import PersonaDataService from "../../services/PersonaDataService";
import CategoriaDataService from "../../services/CategoriaDataService";
import axios from "axios";

export default {
    data() {
        return {
            personas: [],
            currentPersona: null,
            currentIndex: -1,
            categoria: {
                nombre: ""
            },
            isModalActive: false,
            isPaginated: true,
            isSearchable: false,
            perPageList: [5, 10, 15, 20],
            perPage: 5,
            paginationPosition: "bottom"
        };
    },
    components: {
        PersonaForm
    },
    computed: {
        isEmpty() {
            return this.personas.length == 0;
        },
        nombreCategoria() {
            return this.categoria.nombre.toLowerCase().slice(0, -1);
        }
    },
    methods: {
        addPersona(persona) {
            PersonaDataService.create(this.$route.params.id, persona)
                .then(response => {
                    this.isModalActive = false;
                    this.fillPersonasTable();
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },

        editPersona(persona) {
            this.isModalActive = true;
        },

        deletePersona(persona) {
            this.$buefy.dialog.confirm({
                title: `Borrar ${this.categoria.nombre}`,
                message: `¿Estas seguro que desea borrar <b> ${persona.nombre}</b>? Esta acción no se puede revertir.`,
                confirmText: "Borrar",
                cancelText: "Cancelar",
                type: "is-danger",
                hasIcon: true,
                onConfirm: () => {
                    PersonaDataService.delete(persona.id)
                        .then(response => {
                            this.fillPersonasTable();
                            this.$buefy.toast.open("Borrado completado");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            });
        },

        fillPersonasTable() {
            PersonaDataService.getAll(this.$route.params.id)
                .then(response => {
                    this.personas = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        refresh() {
            this.fillPersonasTable();
            this.setActivePersona(null, -1);
            this.setCategoria(this.$route.params.id);
        },
        setActivePersona(persona, index) {
            this.currentIndex = index;
            this.currentPersona = persona;
        },
        setCategoria(id) {
            CategoriaDataService.get(id)
                .then(response => {
                    this.categoria = response.data.data;
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
