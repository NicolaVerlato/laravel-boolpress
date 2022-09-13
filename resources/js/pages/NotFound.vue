<template>
    <div class="container">
        <h2>Pagina non trovata</h2>

        <div>
            Consulta il nostro <router-link :to="{ name: 'blog'}">blog</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>