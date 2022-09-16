<template>
    <header class="mb-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse justify-content-between">     
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-for="link, index in links" :key="index">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: link.name}">{{ link.content }}</router-link>
                        </li>
                    </ul>

                    <div class="nav-item flex-grow-1 text-end">
                        <a class="nav-link" href="/admin">Accedi</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data(){
        return {
            links: [
                {
                    name: 'home',
                    content: 'Home'
                },
                {
                    name: 'about',
                    content: 'About'
                },
                {
                    name: 'blog',
                    content: 'Blog'
                },
                {
                    name: 'contact',
                    content: 'Contatti'
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
header{
    background-color: #3490dc;
    
    .navbar{
        padding: 0.5rem 0;

        .container-fluid{
            padding: 0;
        }

        li{
            padding-right: 10px;
        } 
    }

    .container .nav-item a{
        color: white;
        font-size: 16px;
        padding: 10px 0;
        padding-right: 10px; 
    }

    .text-end{
        text-align: end;
    }
}
</style>