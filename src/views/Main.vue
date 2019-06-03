<template>
    <div class="home">
        <sidebar></sidebar>
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
    </div>
</template>

<script>
// @ is an alias to /src
import Sidebar from '@/components/Sidebar.vue'

export default {
    name: 'home',
    components: {
        Sidebar
    }
}
</script>

<style lang="scss" scoped>

    .home {
        margin: 0;
        padding: 0;
        display: flex;
    }

</style>

