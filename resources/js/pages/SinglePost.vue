<template>
    <div v-if="singlePost" class="container">
        <h2>
            {{ singlePost.title }}
        </h2>

        <p>
            {{ singlePost.content }}
        </p>

        <div v-if="singlePost.tags.length > 0">
            <span v-for="tag in singlePost.tags" :key="tag.id" class="badge rounded-pill bg-success mr-1 mb-2 p-2">{{ tag.name }}</span>
        </div>

        <div v-if="singlePost.category">
            Categoria: {{ singlePost.category.name }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data(){
        return{
            singlePost: null
        }
    },
    methods: {
        getSinglePost() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success){
                    this.singlePost = response.data.results
                } else {
                    this.$router.push({name: 'not-found'})
                }
            })
        }
    },
    mounted(){
        this.getSinglePost()
    }
}
</script>