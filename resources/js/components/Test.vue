<template>
    <div class="container-lg has-background-warning">
        <h1 class="title">Test components:</h1>
        <Modal></Modal>

        <!-- buetify modal -->
        <button class="button is-primary is-medium" @click="isComponentModalActive = true">Launch</button>
        <b-modal
            :active.sync="isComponentModalActive"
            has-modal-card
            trap-focus
            :destroy-on-hide="false"
            aria-role="dialog"
            aria-modal
        >
            <form action>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Login</p>
                    </header>
                    <section class="modal-card-body">
                        <b-field label="Email">
                            <b-input type="email" :value="email" placeholder="Your email" required></b-input>
                        </b-field>

                        <b-field label="Password">
                            <b-input
                                type="password"
                                :value="password"
                                password-reveal
                                placeholder="Your password"
                                required
                            ></b-input>
                        </b-field>

                        <b-checkbox>Remember me</b-checkbox>
                    </section>
                    <footer class="modal-card-foot">
                        <button
                            class="button"
                            type="button"
                            @click="isComponentModalActive = false"
                        >Close</button>
                        <button class="button is-primary">Login</button>
                    </footer>
                </div>
            </form>
        </b-modal>
    </div>
</template>

<script>
import Modal from "./Modal";

export default {
    data() {
        return {
            isComponentModalActive: false,

            email: "ispolitc@gmail.com",
            password: "testing"
        };
    },
    components: {
        Modal
    }
};
</script>
