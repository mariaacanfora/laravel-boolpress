<template>
  <div>
      <header>
          <Navbar></Navbar>
          <!-- <Header :title="post.title" :imgPath="post.imgPath"></Header> -->
          <Header :title="post.title" :imgPath="post.imgPath"></Header>
      </header>

      <main>
          <div class="container-fluid text-center">

              <p class="pt-3">
                  {{post.text}}
              </p>
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
export default {
    components: { Navbar, Header},
    data(){
        return {
            post: {
                type: Object,
            }
        }
    }, 
    methods: {
        fetchPost(){
            window.axios.get('/api/posts/' + this.$route.params.slug).then((resp)=>{
                this.post = resp.data
                console.log(this.post.title);
            })
        }
    },

    mounted(){
        this.fetchPost();
    }
}
</script>

<style lang="scss">

</style>