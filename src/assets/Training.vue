<template>
    <div class="wrapper">
        <h2>TEST</h2>
        {{message}}<hr>
        hello, i`m {{denis.name + ' ' + denis.surname}}, {{denis.age}} y.o <hr>
        {{iconvk}} - просто выведет содержимое<br>
        <span v-html="iconvk"></span> - v-html позволяет писать html <span v-bind:class="cl" v-if="isSeen">текст</span><br>
        v-bind используется для реактивного обновления атрибутов html.<br>
        <a v-bind:href="mysite">Кликай падла</a> v-bind говорит использовать реактивную ссылку
        <p @click="clickme">Пуська кликай {{counter}}</p>
        <hr>
        Вычисляемые свойства - это аналог функции, только он кешируется, то есть запоминаются использующиеся данные,
        и запускает функцию только тогда, когда данные менются. Функция запускалась бы всегда, даже если данные неизменны.
        <hr>
    </div>
</template>

<script>
export default {
    data() {
        let message = 'hello suka';
        let denis = {
            name: 'denis',
            surname: 'rybachek',
            age: 18
        }
        return {
            message,
            denis,
            iconvk: '<i class="fab fa-vk"></i>',
            cl: 'text',
            isSeen: true,
            mysite: 'https://vk.com/',
            counter: 0,
            isRed: true,
            classObject: {
                color: 'blue',
                textDecoration: 'underline'
            },
            fs: {
                fontSize: '20px'
            },
            question: false
        }
    },
    methods: {
        clickme: function() {
            return this.counter++;
        }
    },
    computed: {
        now: function() {
            return Date.now()
        },
    }
}
</script>

<style scoped>

.wrapper {
    background: #f7f7f7;
    height: 100%;
    padding-left: 30px;
}

.text {
    color: red;
}

.rrr {
    color: red;
}

</style>