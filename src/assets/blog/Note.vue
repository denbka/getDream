<template>
    <div class="wrapper">
        <div v-if="info" :key="info.id" class="item">
            <img :src="info.img" alt="">
            <div>
                <h3>{{info.title}}</h3>
                <p>{{info.created}}</p>
                <mark>{{info.author}}</mark>
                <span>Метки: {{info.mark}}</span>
            </div>
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
                this.info = response.data.records[this.$route.params.id-1]
            }, (error) => {
                console.log(error);
            })
        }
    },
    mounted: function() {
        this.showAPI();
    }
}
</script>

<style>

</style>
