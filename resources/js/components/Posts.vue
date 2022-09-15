<template>
    <section>
        <div class="container">
            <h2>Tutti i post</h2>

            <div class="row row-cols-3">
                <div class="col" v-for="post in posts" :key="post.id">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title">{{ post.title }}</h4>

                            <div v-if="post.cover">
                                <img class="w-50" :src="post.cover" :alt="post.title">
                            </div>

                            <p class="card-text">{{ showLessContent(post.content) }}</p>
                            <router-link class="nav-link btn btn-primary" :to="{ name: 'single-post', params: {slug: post.slug} }">Leggi l'articolo</router-link>
                        </div>
                    </div>
                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination mt-3">
                    <li class="page-item" :class="currentPage == 1 ? 'disabled' : ''">
                        <a class="page-link" href="#" @click.prevent="getPosts(currentPage - 1)">
                            Previous
                        </a>
                    </li>

                    <li class="page-item" v-for="page in numberOfPages" :key="page"
                     @click="getPosts(page)" 
                     :class="page == currentPage ? 'active' : ''">
                        <a class="page-link" href="#">{{ page }}</a>
                    </li>

                    <li class="page-item" :class="currentPage == numberOfPages ? 'disabled' : ''">
                        <a class="page-link" href="#" @click.prevent="getPosts(currentPage + 1)">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data() {
        return{
            posts: [],
            currentPage: 1,
            numberOfPages: null
        }
    },
    methods: {
        getPosts(currentPage) {
            axios.get('/api/posts', {
                params: {
                    page: currentPage
                }
            })
            .then((response) => {
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.numberOfPages = response.data.results.last_page;
            })
        },
        showLessContent(text) {
            if(text.length > 100){
                return text.slice(0, 100) + '...';
            } else {
                return text
            } 
        }
    },
    mounted(){
        this.getPosts(1)
    }
}
</script>