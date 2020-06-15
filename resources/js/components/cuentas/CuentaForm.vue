<template>
    <form @submit.prevent="$emit('save', cuenta)">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Nuevo concepto de {{ title }}</p>
            </header>
            <section class="modal-card-body">
                <b-field label="Nombre">
                    <b-input type="text" v-model="cuenta.nombre" placeholder="Nombre" required></b-input>
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
            cuenta: this.initCuenta
        };
    },
    props: {
        initCuenta: {
            type: Object,
            required: true
        },
        title: {
            type: String,
            default: "concepto"
        }
    }
};
</script>
