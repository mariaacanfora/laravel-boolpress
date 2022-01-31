<template>
    <div class="col">
        <div class="card mb-5">
            <div class="card-body">
                <div class="row row-cols-2">
                    <div class="col">
                        <h5 class="card-title">{{post.title}}</h5>
                        <!-- <p class="card-text">{{post.text}}</p> -->
                        <span class="bg-secondary rounded-pill p-1 text-light">Categoria: {{post.category.name}}</span>
                        <img :src="post.imgPath" alt="post's image" class="d-block mt-2" style="max-height: 130px">
                        <!-- <div>
                            <h5 class="d-inline-block text-light" v-for="(tag, i) in post.tags" :key="i">
                                <span class="badge bg-primary">{{$tag.name}}</span>
                            </h5>
                        </div> -->
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <router-link class="btn btn-primary text-light" :to="{name: 'posts.show', params: { slug: post.slug }}">Mostra dettagli</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Post',
    props: {
        post: {
            type: Object,
            required: true
        }
    }

}
</script>

<style>

</style>