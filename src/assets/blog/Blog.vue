<template>
    <div class="wrapper">
        <div v-for="item in info" :key="item.id" class="item">
            <img :src="item.img" alt="">
            <div>
                <h3><router-link :to="{ name: 'post', params: {id: item.id} }" :key="item.id">{{item.title}}</router-link></h3>
                <p>{{item.created}}</p>
                <mark>{{item.author}}</mark>
                <span>Метки: {{item.mark}}</span>
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
                this.info = response.data.records
                this.info.forEach(e => {
                    let mounth = {
                        '01': 'января',
                        '02': 'февраля',
                        '03': 'марта',
                        '04': 'апреля',
                        '05': 'мая',
                        '06': 'июня',
                        '07': 'июля',
                        '08': 'августа',
                        '09': 'сентября',
                        '10': 'октября',
                        '11': 'ноября',
                        '12': 'декабря',
                    }
                    let date = e.created.split('-').reverse()
                    date[1] = mounth[date[1]];
                    date[0] = date[0].replace(/0*/, '');
                    e.created = date.join(' ');
                });
            }, (error) => {
                console.log(error);
            })
        }
    },
    created: function() {
        this.showAPI();
    }
}
</script>

<style lang="scss" scoped>

.wrapper {
width: 70%;
margin: 0 auto;
display: flex;
flex-direction: column;
font-size: 14px;
}

.item {
    display: flex;
    padding-top: 25px;
    img {
        width: 280px;
        height: 210px;
        margin-right: 30px;
    }
    div {
        display: flex;
        flex-direction: column;

        h3 {
            font-size: 1.2em;
            cursor: pointer;
            margin: 0;
        }

        h3:hover {
            text-decoration: underline;
        }
        
        p {
            color: #a7a7a7;
        }
        
        mark {
            background: transparent;
            color: red;
        }
        
        span {
            font-size: 0.9em;
            color: #a7a7a7;
        }
    }
}

</style>