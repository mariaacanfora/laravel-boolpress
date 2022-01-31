<template>
  <div>
      <header>
          <Navbar></Navbar>
          <Header title="Contatti" imgPath="https://www.unicreditgroup.eu/content/unicreditgroup-eu/en/investors/contacts/_jcr_content/content-parsys/image/image.img.png/1634303517322.png"></Header>
      </header>
      <main>
        <div class="container mt-5" @submit.prevent="sendForm()">
          <form v-if="!alreadySend">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input type="text" class="form-control" v-model="form.name">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="email" class="form-control" v-model="form.email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"></label>
              <textarea class="form-control" v-model="form.text" rows="3"></textarea>
            </div>

            <button class="btn btn-primary text-light" type="submit">Invia</button>
          </form>


          <div class="alert alert-success" role="alert" v-else>
            Dati inviati corretamente!
          </div>
        </div>


      </main>
  </div>
</template>

<script>
import Header from '../components/Header.vue'

import Navbar from '../components/Navbar.vue'
export default {
  components: { Navbar, Header },
  data () {
    return {
      form: {
        name: '',
        //email: '', 
        text: ''
      },

      alreadySend: false
    }
  },

  methods: {
    sendForm() {
        window.axios.post("/api/contacts", this.form).then((resp) => {
          
          this.alreadySend = true;
        //this.alreadySend = true
      })
    }
  }
}
</script>

<style>

</style>