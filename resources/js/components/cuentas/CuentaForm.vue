<template>
    <form @submit.prevent="$emit('save', cuenta)">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Nuevo concepto</p>
            </header>
            <section class="modal-card-body">
                <b-field label="Nombre">
                    <b-input
                        type="text"
                        name="nombre"
                        v-model="cuenta.nombre"
                        placeholder="Nombre"
                        required
                    ></b-input>
                </b-field>
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
            cuenta: {
                nombre: ""
            }
        };
    },
    // props: {
    //     initCuenta: {
    //         type: Object,
    //         default: {
    //             nombre: ""
    //         }
    //     }
    // }
};
</script>
