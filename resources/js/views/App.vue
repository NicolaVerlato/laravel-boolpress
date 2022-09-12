<template>
    <main>
        <div class="container mt-2">
            <a href="/admin">Admin</a>
        </div>

        <Posts />
    </main>
</template>

<script>
import Posts from '../components/Posts.vue'

export default {
    name: 'App',
    components: {
        Posts
    }
}
</script>