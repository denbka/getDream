<template>
    <div class="wrapper">
        <h2>Today</h2>
        <div class="to  do-item" v-for="item in todoList" :key="item"></div>
        <button @click="addItem">+</button>
    </div>
</template>

<script>
import Vuex from 'vuex';

export default {
    methods: {
        addItem() {
            let item = 'Получить продукты';
            this.$store.dispath('SAVE_TODO', item);
        }
    },
    computed: {
        todoList() {
            return this.$store.getters.TODOS;
        }
    },
    mounted() {
        this.$store.dispath('GET_TODO');
    }
}
</script>

<style lang="scss" scoped>

button {
    border-radius: 15px;
}

</style>
