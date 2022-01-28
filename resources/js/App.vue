<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
import Header from './components/Header.vue';
import OnlyForHome from './components/OnlyForHome.vue'
import Navbar from './components/Navbar.vue';
import Post from "./components/partials/Post.vue";
//import axios from "axios";

export default {
  name: "App",
  components: { Post, Header, Navbar, OnlyForHome},
};
</script>

<style>

</style>