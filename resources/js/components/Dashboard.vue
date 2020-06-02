<template>
    <div class="columns">
        <aside class="menu column is-3">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li>
                    <a>Panel de control</a>
                </li>
                <li>
                    <a href="#categoria-menu" class="is-active" data-action="collapse">Catalogos</a>
                    <ul id="categoria-menu" class="is-collapsible">
                        <li><a>Categorías</a></li>
                        <li><a>Empleados</a></li>
                        <li><a>Clientes</a></li>
                        <li><a>Materiales</a></li>
                        <li><a>Ingresos</a></li>
                        <li><a>Gastos</a></li>
                    </ul>
                </li>
            </ul>
            <p class="menu-label">Transacciones</p>
            <ul class="menu-list">
                <li>
                    <a>Historial de pagos</a>
                </li>
                <li>
                    <!-- <a>Transferencias</a> -->
                </li>
                <li>
                    <!-- <a>Balance</a> -->
                </li>
            </ul>
            <p class="menu-label">Informes</p>
            <ul class="menu-list">
                <li>
                    <a>Pagos</a>
                </li>
                <li>
                    <a>Transferencias</a>
                </li>
                <li>
                    <a>Balance</a>
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
export default {};
</script>
