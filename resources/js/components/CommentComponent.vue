<template>
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Commentaires
                </div>
                <div class="card-body">
                    <div v-if="user_id && verified_user">
                        <div class="form-group mb-3">
                            <textarea v-model="body" class="form-control"
                            cols="30" rows="2"
                            placeholder="Cliquer ici...."></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-sm btn-success"
                                v-show="body.length"
                                @click="addComment">
                                Envoyer
                            </button>
                        </div>
                    </div>
                    <div v-else>
                        <a :href="to" class="btn btn-link" style="text-decoration: none;">
                            Se connecter pour commenter / Verifier ton compte
                        </a>
                    </div>
                    <ul class="list-group" v-if="comments.length">
                        <li class="list-group-item d-flex flex-column"
                            v-for="(comment,index) in comments" :key="index">
                            <span><b>{{comment.user.name}}:</b> <i>{{comment.body}}</i></span>
                            <span>{{comment.created_at}}</span>
                        </li>
                    </ul>
                    <div class="alert alert-dark" v-else>
                        Pas de commentaires !
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['question_id','user_id','verified_user'],
    data() {
        return {
            body: '',
            comments: [],
            to: !this.user_id && !this.verified_user ? '/login' : '/email/verify'
        }
    },
    mounted(){
        this.getComments();
    },
    methods : {
        addComment(){
            const comment = {
                            body: this.body,
                            question_id: this.question_id,
                            user_id: this.user_id
                        };
            axios.post('/api/comments/add',comment)
                .then(res => {
                    if(res.data.success){
                        this.body = '';
                        this.getComments();
                    }
                }).catch(err => console.log(err));
        },
        getComments(){
            axios.get(`/api/question/${this.question_id}/comments`)
                .then(res => {
                    this.comments = res.data;
                }).catch(err => console.log(err));
        }
    }
}
</script>
