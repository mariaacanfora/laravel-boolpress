<template>
  <div>
      <header>
          <Navbar></Navbar>
          <Header title="Contatti" imgPath="https://www.unicreditgroup.eu/content/unicreditgroup-eu/en/investors/contacts/_jcr_content/content-parsys/image/image.img.png/1634303517322.png"></Header>
      </header>
      <h1 class="text-center">pagina dei contatti</h1>
  </div>
</template>

<script>
import Header from '../components/Header.vue'

import Navbar from '../components/Navbar.vue'
export default {
  components: { Navbar, Header },

}
</script>

<style>

</style>