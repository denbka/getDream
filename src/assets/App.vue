<template>
    <div id="app">
        <sidebar v-if="func()"></sidebar>
        <section>
            <head-menu v-if="func()"></head-menu>
            <router-view></router-view> <!-- Компонент из экземпляра vue router -->
        </section>
    </div>
</template>

<script>
export default {
    methods: {
        func() {
            if (this.$route.name == 'sign_up' || this.$route.name == 'sign_in')
                return false
                else
                return true
        }
    }
}
</script>

<style lang="scss">

@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400');

$color: black;
$widthSidebar: 10%;

body {
    padding: 0;
    margin: 0;
    font-family: 'Noto Sans';
}

#app {
    display: flex;
}

section {
    display: flex;
    flex-direction: column;
    color: $color;
    width: 100%;
}

</style>
