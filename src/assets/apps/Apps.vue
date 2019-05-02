<template>
    <div class="wrapper">
        <div class="pomodoro">
            <div class="timer">{{sliderValue}}:{{secounds}}</div>
            <range-slider class="slider" min="1" max="120" step="1" v-model="sliderValue"></range-slider>
            <button @click="setPomodoro">Строить</button>
            <div>{{message}}</div>
        </div>
    </div>
</template>

<script>
import RangeSlider from 'vue-range-slider'

import 'vue-range-slider/dist/vue-range-slider.css'
import axios from 'axios'
export default {
  data () {
        return {
            sliderValue: 25,
            secounds: 0,
            data: {
                coins: 0,
                firstname: JSON.parse(localStorage.getItem("user")).firstname,
                email: JSON.parse(localStorage.getItem("user")).email
            },
            message: ''
        }
    },
    components: {
        RangeSlider
    },
    methods: {
        setPomodoro() {
            this.data.coins = this.sliderValue;
            this.secounds = 59;
            this.sliderValue--;
            let interval = setInterval(() => {
                this.insert();
                this.secounds--;
                if (this.secounds < 0 && this.sliderValue >= 0) {
                    this.sliderValue--;
                    this.secounds = 59;
                }
                if (this.sliderValue == 0 && this.secounds == 0) {
                    this.setCoins();
                    this.message = 'Success! +' + this.data.coins + 'points';
                    clearInterval(interval);
                }
            }, 1000);
        },
        setCoins() {
            axios.post('http://practice-learn/src/api/actions/user/set_coins.php', {
                coins: this.data.coins,
                firstname: this.data.firstname,
                email: this.data.email
            })
            .then(response => {
                let data = JSON.parse(localStorage.getItem('user'));
                data.coins = response.data.coins;
                localStorage.setItem("user", JSON.stringify(data));
            }, error => {
                console.log(error);
            })
        },
        insert() {
            if (this.minutes >= 0 && this.minutes <= 9) {
                this.minutes = '0' + this.minutes;
            }
            if (this.secounds >= 0 && this.secounds <= 9) {
                this.secounds = '0' + this.secounds;
            }
        },
    },
}
</script>

<style lang="scss" scoped>

.wrapper {
    margin: 200px auto;
}

.slider {
  /* overwrite slider styles */
  width: 200px;
}

.pomodoro {
    display: flex;
    flex-direction: column;
}
</style>
