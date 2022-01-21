<template>
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">{{post.text}}</p>
            <span class="bg-secondary rounded-pill p-1 text-light">Categoria: {{post.category.name}}</span>
            <!-- <div>
                <h5 class="d-inline-block text-light" v-for="(tag, i) in post.tags" :key="i">
                    <span class="badge bg-primary">{{$tag.name}}</span>
                </h5>
            </div>    -->         
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