<template>
  <div>
        <div class="hero-container" :style="{backgroundImage: 'url(' + imgPath + ')'}"><!-- :style="{backgroundImage: 'url(' + bgMap[$route.path] + ')'}" -->
            <h1 class="text-light hero-text">{{title}}</h1>
        </div>
  </div>
</template>

<script>
/* const bgMap = {
  '/': "https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8d2FsbCUyMGJhY2tncm91bmR8ZW58MHx8MHx8&w=1000&q=80",
  '/about': "https://st4.depositphotos.com/1907633/20391/i/600/depositphotos_203913546-stock-photo-thinking-structuring-virtual-diagram-business.jpg",
  '/contacts': "https://www.unicreditgroup.eu/content/unicreditgroup-eu/en/investors/contacts/_jcr_content/content-parsys/image/image.img.png/1634303517322.png",
  '/posts/:slug': "https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8d2FsbCUyMGJhY2tncm91bmR8ZW58MHx8MHx8&w=1000&q=80"
} */
export default {
    name: 'Header',
    props: {
        title: String,
        imgPath: String,
        padding: String
    },
    data() {
      return {
        /* bgMap */
      }
    }
}
</script>

<style lang="scss">

</style>