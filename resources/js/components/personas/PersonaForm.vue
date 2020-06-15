<template>
    <form @submit.prevent="$emit('save', persona)">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Nuevo {{ categoria }}</p>
            </header>
            <section class="modal-card-body">
                <b-field label="Nombre">
                    <b-input
                        type="text"
                        name="nombre"
                        v-model="persona.nombre"
                        placeholder="Nombre"
                        required
                    ></b-input>
                </b-field>
                <b-field label="Apellidos">
                    <b-input
                        type="text"
                        name="apellidos"
                        v-model="persona.apellidos"
                        placeholder="Apellidos"
                        required
                    ></b-input>
                </b-field>
                <b-field label="Telefono">
                    <b-input
                        type="text"
                        name="telefono"
                        v-model="persona.telefono"
                        placeholder="Telefono"
                    ></b-input>
                </b-field>
                <b-field label="Direccion">
                    <b-input
                        type="text"
                        name="direccion"
                        v-model="persona.direccion"
                        placeholder="Dirección"
                    ></b-input>
                </b-field>
                <!-- < label="Puesto" select
                        name="puesto"
                        id="puesto-persona"
                        v-model="persona.puesto"
                        class="input"
                    >
                        <option value="jefe">jefe</option>
                    option value="monigote">monigote</option>
                        <option value="jefazo">jefazo</option>
                    </select>
                </div>-->
            </section>
            <footer class="modal-card-foot">
                <button class="button" type="button" @click="$parent.close()">Cancelar</button>
                <button class="button is-primary">Guardar</button>
            </footer>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            persona: this.initPersona
        };
    },
    props: {
        initPersona: {
            type: Object,
            required: true
        },
        categoria: {
            type: String,
            default: "Beneficiario"
        }
    }
};
</script>
