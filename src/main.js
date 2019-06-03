import Vue from 'vue'
import Router from 'vue-router'
import store from './store'
import elementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import './assets/element-variables.scss'
import App from './App.vue'

Vue.config.productionTip = false
Vue.use(Router);
Vue.use(elementUI)

import Main from './views/Main.vue'
import TodoList from './views/TodoList.vue'

const router = new Router({
    mode: 'history',
    routes: [
        { path: '/', component: Main },
        { path: '/todo', component: TodoList },
    ]
})

new Vue({
    router,
    store,
  render: h => h(App)
}).$mount('#app')
