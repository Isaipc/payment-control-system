<template>
    <div>
        <h2 class="subtitle">Catalogos</h2>
        <h1 class="title">{{ categoria }}</h1>
        <persona-form id="persona-form" :categoria="categoria"></persona-form>
        <br />
        <div class="notification is-info is-light" v-if="isEmpty">No hay registros</div>
        <div class="table-container" v-else>
            <table class="table is-bordered is-stripped is-hoverable is-narrow">
                <thead class="is-uppercase">
                    <th>id</th>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>creado</th>
                    <th>actualizado</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr
                        v-for="(persona, index) in personas"
                        :key="persona.id"
                        :class="{ 'is-selected': index == currentIndex }"
                        @click="setActivePersona(persona, index)"
                    >
                        <th>{{ persona.id }}</th>
                        <td>{{ persona.nombre }}</td>
                        <td>{{ persona.apellidos }}</td>
                        <td>{{ persona.created_at }}</td>
                        <td>{{ persona.updated_at }}</td>
                        <td>
                            <div class="buttons has-addons">
                                <router-link
                                    :to="{name: 'edit', params: { id: persona.id }}"
                                    class="button is-primary"
                                >
                                    <i class="fas fa-pen"></i>
                                </router-link>
                                <button class="button is-danger" @click="deletePersona(persona.id)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
            categoria: ''
        };
    },
    components: {
        PersonaForm
    },
    computed: {
        isEmpty() {
            return this.personas.length == 0;
        }
    },
    methods: {
        deletePersona() {},

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
        setCategoria(id){
            CategoriaDataService.get(id)
            .then(response => {
                this.categoria = response.data.data.nombre;
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
