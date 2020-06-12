<template>
    <div @keyup.esc="close()">
        <button class="button is-link" @click="open()">
            <slot name="toggle-button">default toggle</slot>
        </button>
        <transition name="modal">
            <div :class="{'modal': true, 'is-active': isActive }">
                <div class="modal-background modal-mask" @click="close()"></div>
                <div class="modal-card modal-container">
                    <header class="modal-card-head">
                        <p class="modal-card-title">
                            <slot name="title">Default Header</slot>
                        </p>
                        <button class="delete" aria-label="close" @click="close()"></button>
                    </header>
                    <section class="modal-card-body">
                        <slot name="body">Default Body</slot>
                    </section>
                    <footer class="modal-card-foot">
                        <!-- <slot name="foot">Default Foot</slot> -->
                        <button class="button is-success" @click="$emit('save')">Guardar</button>
                        <button class="button" @click="close()">Cancelar</button>
                    </footer>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isActive: false
        };
    },
    props: {
        propName: {
            type: Number,
        },
    },
    methods: {
        open() {
            this.isActive = true;
        },
        close() {
            this.isActive = false;
        }
    },
};
</script>


<style>
.modal-mask {
    transition: opacity 0.3s ease;
}

.modal-container {
    transition: all 0.3s ease;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
