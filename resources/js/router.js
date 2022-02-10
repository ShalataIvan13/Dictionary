import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/words', component: () => import('./components/Word/Index'),
            name: 'word.index'
        },
        {
            path: '/words/create', component: () => import('./components/Word/Create'),
            name: 'word.create'   
        },
        {
            path: '/words/id/edit', component: () => import('./components/Word/Edit'),
            name: 'word.edit'   
        },
    ],
})
