<template>
    <div id="app">
        <Main></Main>
    </div>
</template>

<script>
import Main from './views/Main.vue'

export default {
  components: {
    Main
  }
}
</script>


<style lang="scss">

@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400');

$color: black;
$widthSidebar: 10%;

body {
    margin: 0;
}

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
