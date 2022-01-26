<template>
  <div>
      <header>
          <Navbar></Navbar>
          <Header title="Boolpress" imgPath="https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8d2FsbCUyMGJhY2tncm91bmR8ZW58MHx8MHx8&w=1000&q=80"></Header>
      </header>
      <main>
          <div class="container">
        <h2 class="mb-5 text-center" v-if="postList.length === 0">
          Ancora nessun dato disponibile...
        </h2>

        <div class="mt-5" v-else>
          <div class="row row-cols-2">
            <Post v-for="(post, i) in postList" :key="i" :post="post"></Post>
          </div>

          <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li>
                    <button class="page-link" @click="(currentPage != 0 && currentPage>0) ? getData(currentPage - 1) : getData(currentPage)">Indietro</button>
                </li>
                <li v-for="page in lastPage" :key="page" class="page-item" :class="{'active' : currentPage === page}">
                    <button class="page-link" @click="getData(page)">{{ page }}</button>
                </li>

                <li>
                    <button class="page-link" @click="(currentPage<lastPage) ? getData(currentPage + 1) : getData(currentPage)">Avanti</button>
                </li>
            </ul>
          </div>
        </div>
        </div>
      </main>
      
  </div>
</template>

<script>
import Header from '../components/Header.vue';
import Navbar from '../components/Navbar.vue';
import Post from '../components/partials/Post.vue'

export default {
    components: {Post, Header, Navbar},
    data() {
        return {
            postList: [],
            currentPage: 1,
            lastPage: null,
        };
    },

    methods: {
        getData(page = 1) {
            window.axios.get("/api/posts?page=" + page).then((resp) => {
                //console.log(resp.data);
                this.postList = resp.data.data;
                this.currentPage = resp.data.current_page;
                this.lastPage = resp.data.last_page;
            });
        },
    },
    mounted() {
        this.getData();
    },
}
</script>

<style>

</style>