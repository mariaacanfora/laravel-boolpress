<template>
  <div>
    <header>
        <Navbar></Navbar>
        <OnlyForHome title="Boolpress" imgPath="https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8d2FsbCUyMGJhY2tncm91bmR8ZW58MHx8MHx8&w=1000&q=80"></OnlyForHome>
    </header>
    <main>
        <div class="container-fluid" v-if="!loading">
            <h2 class="mb-5 text-center" v-if="postList.length === 0">
                Ancora nessun dato disponibile...
            </h2>

            <div class="mt-5 mx-5" v-else>
                <div class="row">
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="list-group-item text-center">
                                <h6>Categorie</h6>
                            </li>
                            <li class="list-group-item list-group-item-action" :class="'list-group-item-' + colorCategoriesMap[category.id]" v-for="category in categories" :key="category.id">
                               <router-link :to="{ name: 'category.show', params: { category: category.id }}" class="text-decoration-none text-dark d-inline-block w-100"> {{category.name}}</router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <div class="row row-cols-2">
                            <Post v-for="(post, i) in postList" :key="i" :post="post"></Post>
                        </div>
                    </div>
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

        <div v-else class="container text-center">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%"> 
                </div>
            </div>
        </div>
    </main>
      
  </div>
</template>

<script>
import HeaderHome from '../components/Header.vue';
import Navbar from '../components/Navbar.vue';
import OnlyForHome from '../components/OnlyForHome.vue';

import Post from '../components/partials/Post.vue'

export default {
    components: {Post, HeaderHome, Navbar, OnlyForHome},
    data() {
        return {
            postList: [],
            currentPage: 1,
            lastPage: null,
            categories: [],
            colorCategoriesMap: {
                1: 'danger', 
                2: 'success',
                3: 'secondary', 
                4: 'warning', 
                5: 'info'
            }, 

            loading: true
        };
    },

    methods: {
        getData(page = 1) {
            window.axios.get("/api/posts?page=" + page).then((resp) => {
                this.loading = true;
                //console.log(resp.data);
                this.postList = resp.data.data;
                this.currentPage = resp.data.current_page;
                this.lastPage = resp.data.last_page;
                this.loading = false;
            });
        },

        getCategories(){
            window.axios.get('/api/category').then((resp) => {
                this.categories = resp.data;
                console.log(this.categories);
                console.log(this.categories[0].posts);
            })
        },
    },
    mounted() {
        this.getData();
        this.getCategories();
    },
}
</script>

<style>

</style>