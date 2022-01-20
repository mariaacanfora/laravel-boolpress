<template>
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">{{post.text}}</p>
            <span class="bg-secondary rounded-pill p-1 text-light">Categoria: {{post.category.name}}</span>
            <!-- <p>{{post.created_at}}</p> -->
            <!-- <a href="'/posts/' + post.id" class="btn btn-primary">Go somewhere</a> -->
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