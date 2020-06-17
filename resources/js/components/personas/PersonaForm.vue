<template>
    <form @submit.prevent="$emit('save', persona)">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Nuevo {{ categoria }}</p>
            </header>
            <section class="modal-card-body">
                <b-field grouped>
                    <b-field label="Nombre">
                        <b-input
                            type="text"
                            name="nombre"
                            v-model="persona.nombre"
                            required
                            custom-class="is-uppercase"
                        ></b-input>
                    </b-field>
                    <b-field label="Apellidos" expanded>
                        <b-input
                            type="text"
                            name="apellidos"
                            v-model="persona.apellidos"
                            required
                            custom-class="is-uppercase"
                        ></b-input>
                    </b-field>
                </b-field>
                <b-field grouped>
                    <b-field label="Telefono">
                        <b-input
                            type="phone"
                            name="telefono"
                            v-model="persona.telefono"
                            maxlength="10"
                            min="0"
                        ></b-input>
                    </b-field>
                    <b-field label="Fecha de nacimiento" expanded>
                        <b-datepicker
                            icon="calendar-day"
                            editable
                            position="is-bottom-right"
                            v-model="persona.nacimiento"
                            placeholder="Teclee o seleccione una fecha"
                        >
                            <button
                                class="button is-primary"
                                @click="persona.nacimiento = new Date()"
                            >
                                <b-icon icon="calendar-day"></b-icon>
                                <span>Hoy</span>
                            </button>

                            <button class="button is-danger" @click="persona.nacimiento = null">
                                <b-icon icon="times"></b-icon>
                                <span>Limpiar</span>
                            </button>
                        </b-datepicker>
                    </b-field>
                </b-field>
                <b-field label="Direccion">
                    <b-input
                        type="text"
                        name="direccion"
                        v-model="persona.direccion"
                        custom-class="is-uppercase"
                    ></b-input>
                </b-field>
                <b-field grouped>
                    <b-field label="Puesto">
                        <b-select v-model="persona.puesto" placeholder="Seleccione un puesto">
                            <option
                                v-for="(option, index) in puestos"
                                :value="option"
                                :key="index"
                            >{{ option }}</option>
                        </b-select>
                    </b-field>
                    <b-field label="Pago fijo">
                        <b-input
                            type="number"
                            min="0"
                            placeholder="Teclee el pago"
                            v-model="persona.pago_fijo"
                        ></b-input>
                    </b-field>
                    <b-checkbox v-model="persona.es_nadador_indie">Es nadador independiente</b-checkbox>
                </b-field>
                <b-field grouped>
                    <b-field label="Hora entrada">
                        <b-timepicker
                            v-model="persona.hora_entrada"
                            icon="clock"
                            editable
                            hour-format="12"
                            inline
                        ></b-timepicker>
                    </b-field>
                    <b-field label="Hora salida">
                        <b-timepicker
                            v-model="persona.hora_salida"
                            icon="clock"
                            editable
                            hour-format="12"
                            inline
                        ></b-timepicker>
                    </b-field>
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
            persona: this.initPersona,
            puestos: ["ENTRENADOR", "ALBERQUERO", "ADMINISTRADOR", "SUPLENTE"]
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
