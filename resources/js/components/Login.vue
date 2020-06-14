<template>
    <div>
        <div class="container">
            <div class="notification is-danger" v-if="error">
                <p>{{error}}</p>
            </div>

            <div class="column is-4 is-offset-4">
                <div class="box">
                    <h1 class="title">Iniciar sesión</h1>
                    <form autocomplete="off" @submit.prevent="login" method="post">
                        <b-field label="Email">
                            <b-input type="email" v-model="username" placeholder="email" required></b-input>
                        </b-field>

                        <b-field label="Contraseña">
                            <b-input
                                type="password"
                                v-model="password"
                                password-reveal
                                placeholder="contraseña"
                                required
                            ></b-input>
                        </b-field>

                        <b-checkbox>Remember me</b-checkbox>

                        <b-field>
                            <!-- <button class="button" type="button"></button> -->
                            <button class="button is-primary">Entrar</button>
                        </b-field>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: null,
            password: null,
            error: null
        };
    },
    methods: {
        login() {
            this.$store
                .dispatch("retrieveToken", {
                    username: this.username,
                    password: this.password
                })
                .then(response => {
                    this.$router.push({ name: "dashboard" });
                })
                .catch(error => {
                    this.error = error.response.data;
                });
        }
    }
};
</script>
