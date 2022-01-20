<template>
    <div class="card mb-5 rounded-pill">
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">{{post.text}}</p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
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