import Vue from 'vue'
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
    { path: '/blog', meta: {requiresAuth: true}, component: Blog },
    { path: '/account', meta: {requiresAuth: true}, component: PersonalArea },
    { path: '/settings', meta: {requiresAuth: true}, component: Settings },
    { path: '/training', meta: {requiresAuth: true}, component: Training },
    { path: '/blog/post/:id', name: 'post', meta: {requiresAuth: true}, component: Note },
    { path: '/sign_up', name: 'sign_up', meta: {guest: true}, component: SignUp },
    { path: '/sign_in', name: 'sign_in', meta: {guest: true}, component: SignIn },
    { path: '/todo', meta: {requiresAuth: true}, component: Todo },
    { path: '/apps', meta: {requiresAuth: true}, component: Apps},
    { path: '/*', meta: {requiresAuth: true} }
  ],
  mode: 'history'
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('user') == null) {
            next({
                path: '/sign_in',
                params: {nextUrl: to.fullPath}
            })
        } else {
            let user = JSON.parse(localStorage.getItem('user'));

            if (to.matched.some(record => record.meta.isAdmin)) {
                if (user.isAdmin == 1) {
                    next();
                } else {
                    next({path: '/account'});
                }
            } else {
                    next();
                }
            }
        } else if(to.matched.some(record => record.meta.guest)) {
            if(localStorage.getItem('user') == null){
                next()
            }
            else{
                next({path: '/account'})
            }
        } else {
            next() 
        }
})

new Vue({
    el: '#app',
    router,
    render: h => h(App)
}) 
