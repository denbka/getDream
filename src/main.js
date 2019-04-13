import Vue from 'vue'
import Vuex from 'vuex';
import Axios from 'axios';
import VueRouter from 'vue-router'
import App from './assets/App.vue'
import Sidebar from './assets/main/Sidebar.vue'
import HeadMenu from './assets/main/HeadMenu.vue'
import PersonalArea from './assets/personalArea/PersonalArea.vue'
import Settings from './assets/personalArea/Settings.vue'
import Blog from './assets/blog/Blog.vue'
import Training from './assets/Training.vue'
import Note from './assets/blog/Note.vue'
import SignUp from './assets/sign/SignUp.vue'
import SignIn from './assets/sign/SignIn.vue'
import Todo from './assets/todos/Todo.vue'
import Apps from './assets/apps/Apps.vue'
import {store} from './store'


Vue.use(VueRouter);

Vue.component('sidebar', Sidebar);
Vue.component('head-menu', HeadMenu);
Vue.component('personal-area', PersonalArea);
Vue.component('settings', Settings);
Vue.component('blog', Blog);
Vue.component('training', Training);
Vue.component('note', Note);
Vue.component('todo', Todo);
Vue.component('applications', Apps);

let router = new VueRouter({
  routes: [
    { path: '/blog', component: Blog },
    { path: '/account', component: PersonalArea },
    { path: '/settings', component: Settings },
    { path: '/training', component: Training },
    { path: '/blog/post/:id', name: 'post', component: Note },
    { path: '/sign_up', name: 'sign_up', component: SignUp },
    { path: '/sign_in', name: 'sign_in', component: SignIn },
    { path: '/todo', component: Todo },
    { path: '/apps', component: Apps}
  ],
  mode: 'history'
})

new Vue({
  el: '#app',
  store,
  router,
  render: h => h(App)
})
