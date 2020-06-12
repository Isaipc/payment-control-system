<template>
    <ul>
        <li v-for="(item, index) in listItems" :key="index">
            <router-link :to="{ name:  item.route, params: { id: item.id }}">{{ item.nombre }}</router-link>
        </li>
    </ul>
</template>


<script>
import CategoriaDataService from "../services/CategoriaDataService";
import TiposCuentaDataService from "../services/TiposCuentaDataService";

export default {
    data() {
        return {
            categorias: [],
            tiposCuenta: []
        };
    },
    created() {
        this.getCategorias();
        this.getTiposCuenta();
    },
    methods: {
        getCategorias() {
            CategoriaDataService.getAll()
                .then(response => {
                    this.categorias = response.data.data;
                    this.categorias.forEach( e => {
                        e.route = 'personas';
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getTiposCuenta() {
            TiposCuentaDataService.getAll()
                .then(response => {
                    this.tiposCuenta = response.data.data;
                    this.tiposCuenta.forEach( e => {
                        e.route = 'cuentas';
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    computed: {
        listItems() {
            return this.categorias.concat(this.tiposCuenta);
        }
    },
};
</script>
