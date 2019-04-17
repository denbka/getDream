<template>
    <div class="wrapper">
        <h2>Today</h2>
        <div class="addTodo">
            <input type="text" placeholder="Новая задача" v-model="newTodo" @keypress.enter="addTodo(newTodo)">
            <div>
                <button @click="addTodo(newTodo)">Add</button>
                <button @click="canselTodo()">Очистить</button>
            </div>
        </div>
        <div class="todos">
            <div v-for="item in todos" :key="item">
                {{item}}
                <button @click="removeTodo(item)">x</button>
            </div>
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
        removeTodo(currentItem) {
            this.todos.splice(currentItem, 1)
        },
        clearAll() {
            this.todos = []
        }
    },
    // computed: {
    //     work() {
    //         this.$store.dispatch('NEW_TODO', 'hello');
    //     }
    // }
}
</script>

<style lang="scss" scoped>

.wrapper {
    display: flex;
    flex-direction: column;
    padding: 25px 0px;
    width: 60%;
    margin: 0 auto;
}

.addTodo {
    display: flex;
    border-bottom: 1px solid grey;
    justify-content: space-between;
    
    div {
        
    }

    input {
        border: none;
    }

    button {
        border: none;
    }
}

.todos {
    margin: 25px 0;

    div {
        background: green;
    }
}

button:last-child {
    align-self: center;
}

</style>
