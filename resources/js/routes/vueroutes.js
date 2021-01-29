import Vue from 'vue'
import VueRouter from 'vue-router'
import List from '../components/List/Index.vue'
import Edit from '../components/Edit/Index.vue'
import Create from '../components/Create/Index.vue'
import Search from '../components/Search/Index.vue'

Vue.use(VueRouter)

const routes = [
    { name:'lista', path: '/lista', component: List },
    { path: '/', component: List },
    { path: '/edit/:id', component: Edit },
    { path: '/create', component: Create },
    { path: '/search', component: Search },
]

export default new VueRouter({
    mode: 'history',
    routes
})