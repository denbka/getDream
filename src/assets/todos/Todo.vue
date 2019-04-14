<template>
    <div class="wrapper">
        <h2>Today</h2>
        <input type="text" placeholder="Новая задача" v-model="newTodo" @keypress.enter="addTodo(newTodo)">
        <button @click="addTodo(newTodo)">Add</button>
        <button @click="canselTodo()">Очистить</button>
        <div v-for="item in todos" :key="item">
            {{item}}
        </div>
        <button @click="clearAll">Удалить все задачи</button>
    </div>
</template>

<script>

export default {
    data() {
        return {
            newTodo: '',
            todos: []
        }
    },
    methods: {
        addTodo(todo) {
            this.todos.push(todo)
            this.newTodo = ''
        },
        canselTodo() {
            this.newTodo = ''
        },
        removeTodo() {
            this.todos.splice(index, 1)
        },
        clearAll() {
            this.todos = []
        }
    }
}
</script>

<style lang="scss" scoped>

button {
    border-radius: 15px;
}

</style>
