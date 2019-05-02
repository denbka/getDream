<template>
    <div class="wrapper">
        <div v-if="info" :key="info.id" class="item">
                <h3>{{info.title}}</h3>
                <div class="buf">
                    <mark>{{info.author}}</mark>
                   <span>Метки: {{info.mark}}</span>
                </div>
                <div class="description">{{info.description}}</div>
                <p>{{info.created}}</p>
        </div>
    </div>
</template>


<script>
import axios from 'axios'

export default {
    data() {
        return {
            info: null
        }
    },
    methods: {
        showAPI: function() {
            axios
            .get('http://myblog/src/api/actions/note/read.php')
            .then((response) => {
                this.info = response.data.records[this.$route.params.id]
                console.log(this.info);
            }, (error) => {
                console.log(error);
                console.log(this.$route.params.id);
            })
        }
    },
    mounted: function() {
        this.showAPI();
    }
}
</script>

<style lang="scss" scoped>

.wrapper {
    width: 80%;
    margin: 0 auto;
}

.item {
    display: flex;
    flex-direction: column;
    padding-top: 100px;
}

.buf {
    color: rgb(65, 65, 65);
    display: flex;
    justify-content: space-around;
}
mark {
    background: transparent;
    color: rgb(65, 65, 65);
}

.description {
    padding: 20px 0;
}

</style>
