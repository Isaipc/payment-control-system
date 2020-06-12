<template>
    <modal @save="$emit('save', cuenta)">
        <span slot="toggle-button">Agregar</span>

        <span slot="title">Nuevo</span>

        <span slot="body">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input
                        id="nombre-cuenta"
                        class="input"
                        type="text"
                        name="nombre"
                        v-model="cuenta.nombre"
                        placeholder="Nombre"
                        required
                    />
                </div>
                <!-- <p class="help">This is a help text</p> -->
            </div>
        </span>
    </modal>
</template>

<script>
import Modal from "../Modal";

export default {
    data() {
        return {
            cuenta: {
                nombre: "",
            }
        };
    },
    components: {
        Modal
    },
};
</script>
