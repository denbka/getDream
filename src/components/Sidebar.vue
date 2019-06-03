<template>
    <div class="wrapper">
        <img :src="logo" alt="logo" class="logo">
        <nav>
            <router-link v-for="el in menu" v-html="el.icon" :to="el.src" :key="el.src"></router-link><!-- элемент из экземпляра vue router для роутинга -->
        </nav>
    </div>
</template>

<script>
import Logo from '@/assets/logo.png'

export default {
    data() {
        return {
            logo: Logo,
            menu: [
                {src: '/account', icon: '<i class="fas fa-user-circle"></i>'},
                {src: '/todo', icon: '<i class="fas fa-th-list"></i>'},
                {src: '/blog', icon: '<i class="fas fa-pencil-alt"></i>'},
                {src: '/apps', icon: '<i class="fas fa-rocket"></i>'},
                {src: '/training', icon: '<i class="fas fa-cog"></i>'}
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

$widthSidebar: 100px;

.logo {
    width: 60%;
    margin: 19px;
}
.wrapper {
    background: #292D39;
    width: $widthSidebar;
    height: 100vh;
}
nav {
    display: flex;
    flex-direction: column;
    padding: 0;
    margin: 0;
    list-style-type: none;
    cursor: pointer;
    a {
        width: 100%;
        font-size: 40px;
        color: #555;
        text-align: center;
        padding: 5px 0px;
    }
    a:hover {
        color: #e3e3e3;
        background: #000;
        transition: 0.2s;
    }
}
</style>