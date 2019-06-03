<template>
    <div class="wrapper">
        <el-row>
            <el-col :span="12">
                <el-input v-model="todo" placeholder="Введите задачу"></el-input>
            </el-col>
            <el-col :span="12">
                <el-button type="primary" @click="add">Добавить</el-button>
            </el-col>
        </el-row>
        <el-row>
            <el-col :span="24">
                <el-table
                :data="todos"
                empty-text="Нет задач">
                    <el-table-column
                    prop="name"
                    label="Название">
                    </el-table-column>
                    <el-table-column
                    width="120">
                        <template slot-scope="scope">
                            <el-button type="text" size="small" @click.native.prevent="remove(scope.$index, todos)">Завершить</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    data: () => ({
        todo: '',
        todos: []
    }),
    methods: {
        add() {
            this.todos.push({name: this.todo})
            this.todo = ''
        },
        remove(index, todos) {
            this.todos.splice(index, 1);
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
