<template>
  <nav class="navbar navbar-expand-lg nav-position" id="mainNav">
        <div class="container px-4 px-lg-5">
            <!-- <router-link class="navbar-brand" to="/">
                {{ "Laravel Blog" }}
            </router-link> -->

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item">
                        <router-link :to="{ name: 'home' }" class="btn text-light">Home</router-link>
                    </li>

                    <li class="nav-item">
                        <router-link :to="{ name: 'about' }" class="btn text-light">Su di noi</router-link>
                    </li>

                    <li class="nav-item">
                        <router-link :to="{ name: 'contacts' }" class="btn text-light">Contatti</router-link>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar',
}
</script>

<style lang='scss'>
.nav-position{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 99;
}
</style>