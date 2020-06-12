<template>
    <modal>
        <span slot="toggle-button">Agregar</span>
        <span slot="title">
            Nuevo
            <!-- {{ categoria }} -->
        </span>
        <span slot="body">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input
                        id="nombre-persona"
                        class="input"
                        type="text"
                        name="nombre"
                        v-model="persona.nombre"
                        placeholder="Nombre"
                        required
                    />
                </div>
                <label class="label">Apellidos</label>
                <div class="control">
                    <input
                        id="apellidos-persona"
                        class="input"
                        type="text"
                        name="apellidos"
                        v-model="persona.apellidos"
                        placeholder="Apellidos"
                        required
                    />
                </div>
                <label class="label">Telefono</label>
                <div class="control">
                    <input
                        id="telefono-persona"
                        class="input"
                        type="text"
                        name="telefono"
                        v-model="persona.telefono"
                        placeholder="Telefono"
                        required
                    />
                </div>
                <label class="label">Direccion</label>
                <div class="control">
                    <input
                        id="direccion-persona"
                        class="input"
                        type="text"
                        name="direccion"
                        v-model="persona.direccion"
                        placeholder="Dirección"
                        required
                    />
                </div>
                <label class="label">Puesto</label>
                <div class="control">
                    <select
                        name="puesto"
                        id="puesto-persona"
                        v-model="persona.puesto"
                        class="input"
                    >
                        <option value="jefe">jefe</option>
                        <option value="monigote">monigote</option>
                        <option value="jefazo">jefazo</option>
                    </select>
                </div>
                <!-- <p class="help">This is a help text</p>-->
            </div>
        </span>
    </modal>
</template>

<script>
import Modal from "../Modal";

export default {
    data() {
        return {
            persona: {
                nombre: "",
                created_user_id: "",
                updated_user_id: "",
                tipo_persona_id: ""
            }
        };
    },
    props: {
        categoria: {
            type: String,
            default: "Beneficiario"
        }
    },
    methods: {
        inputStatus() {
            // console.log('persona', this.persona);
        }
    },
    components: {
        Modal
    }
};
</script>
