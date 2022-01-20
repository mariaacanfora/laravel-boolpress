<template>
  <div>
      <header>
          <div class="hero-container">
              <h1 class="text-light hero-text">Boolpress</h1>
          </div>
      </header>

      <main>
          <div class="container">
                <h2 class="mb-5 text-center" v-if="postList.length === 0">
                    Ancora nessun dato disponibile...
                </h2>

                <div class="mt-5" v-else>
                    <Post
                        v-for="post in postList"
                        :key="post.id"
                        :post="post"
                    ></Post>
                </div>
          </div>
      </main>
  </div>
</template>

<script>
import Post from "./partials/Post.vue";

export default {
    name: 'App',
    components: {Post},
    data (){
        return {
            postList: []
        }
    },
    mounted(){
         window.axios.get("/api/posts").then((resp) => {
            this.postList = resp.data;
        });
    }
}
</script>

<style lang="scss">
header{
    .hero-container{
        background-image: url('https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8d2FsbCUyMGJhY2tncm91bmR8ZW58MHx8MHx8&w=1000&q=80');
        background-size: cover;
        padding-top: 500px;
        background-position: top;
        position: relative;

        .hero-text{
            text-shadow: 0 0 3px #000000;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
        }
    }
}
</style>