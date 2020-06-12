<template>
    <div class="container">
        <h1 class="title is-1"> {{ welcome }} </h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            welcome: 'Bienvenido @usuario'
        }
    },
    created () {
        console.log('loggedIn', this.$store.getters.loggedIn);
        console.log('$store', this.$store);
    },
};
</script>
