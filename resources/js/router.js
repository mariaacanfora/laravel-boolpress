import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './pages/Home.vue'
import Contacts from './pages/Contacts.vue'
import About from './pages/About.vue'
import Show from './pages/Posts/Show.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/',
            name: 'home',
            component: Home
        },

        {
            path:'/contacts',
            name: 'contacts',
            component: Contacts
        },

        {
            path:'/about',
            name: 'about',
            component: About
        },

        {
            path:'/posts/:slug',
            name: 'posts.show',
            component: Show
        }
    ]
})

export default router;