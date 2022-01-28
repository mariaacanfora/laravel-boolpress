<template>
    <div>
        <header>
            <Navbar></Navbar>
            <Header title="" imgPath="https://www.laverapergamena.com/wp-content/uploads/2020/11/Depositphotos_1200x630.jpg"></Header>
            
        </header>

        <main>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-6">
                        <Post v-for="post in posts" :key="post.id" :post="post"></Post>
                    </div>
                </div>
              
              <!-- <span>
                  {{post.created_at}}
              </span> -->
          </div>
        </main>
    </div>
</template>

<script>
import Header from '../../components/Header.vue'
import Navbar from '../../components/Navbar.vue'
import Post from '../../components/partials/Post.vue'
export default {
    components: {Header, Navbar, Post},
    data (){
        return {
            posts: []
        }
    },
    methods: {
        fetchData(){
            window.axios.get('/api/category/' + this.$route.params.category).then((resp) =>{
                //console.log(resp.data.posts);
                this.posts = resp.data.posts;
                console.log(this.posts.length);
            })
        }
    },

    mounted(){
        this.fetchData();
    }
}
</script>

<style>

</style>