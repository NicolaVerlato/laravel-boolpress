<template>
    <div class="container">
        <h2>Contattaci</h2>

        <div v-if="success" class="alert alert-success" role="alert">
            Grazie per averci contattato
        </div>

        <form @submit.prevent="sendMessage">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input v-model="userName" type="text" class="form-control" id="name">
            </div>
            <div v-if="errors.name" class="mt-2">
                <div v-for="error, index in errors.name" :key="index" class="alert alert-danger" role="alert">
                    {{ error }}
                </div>
            </div>

            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input v-model="userEmail" type="email" class="form-control" id="mail" placeholder="nome@email.com">
            </div>
            <div v-if="errors.email" class="mt-2">
                <div v-for="error, index in errors.name" :key="index" class="alert alert-danger" role="alert">
                    {{ error }}
                </div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea v-model="userText" class="form-control" id="message" rows="5"></textarea>
            </div>
            <div v-if="errors.message" class="mt-2">
                <div v-for="error, index in errors.name" :key="index" class="alert alert-danger" role="alert">
                    {{ error }}
                </div>
            </div>

            <input type="submit" class="btn btn-primary" :disabled="send">
        </form>
    </div>
</template>

<script>
export default {
    name: 'ContactPage',
    data(){
        return{
            userName: '',
            userEmail: '',
            userText: '',
            success: false,
            errors: {},
            send: false
        }
    },
    methods: {
        sendMessage(){
            this.send = true

            axios.post('/api/leads', {
                name: this.userName,
                email: this.userEmail,
                message: this.userText 
            })
            .then((response) => {
                if(response.data.success){
                    this.success = true;

                    this.userName = '';
                    this.userEmail = '';
                    this.userText = '';
                    this.errors = {};
                    this.success = true
                }else{
                    this.errors = response.data.errors
                }
                this.send = false
            });
        }
    }
}
</script>