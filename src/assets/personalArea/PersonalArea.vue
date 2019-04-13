<template>
    <div class="wrapper">
        <div class="profile">
            <div class="data">
                <ul>
                    <li>Денис Рыбачек</li>
                    <li><mark>Цель:</mark><span>Написать 50 песен</span></li>
                    <li><mark>Дримов:</mark><span>280</span></li>
                    <li><mark>Достижений:</mark><span>17</span></li>
                </ul>
            </div>
            <div class="information">
                <div class="block">1</div>
                <div class="progress-bar">
                    <div class="complete" :style="{width: 51 + '%'}"></div>
                    <mark>level 1 - 51%</mark>
                </div>
            </div>
        </div>
        <div class="achievements">
            <h2>17 достижений</h2>
            <div class="achi-list">
                <div class="item">
                    <img src="https://assets.htmlacademy.ru/img/achievements/world/newyear-2019-sheriff-winner.svg" alt="achievement">
                    <div>
                        <h4>Укротитель демонбагов</h4>
                        <p>Победить в новогоднем расследовании 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            information : {
                achievements: '6'
            },
            counter: 45,
            max: 100
        }
    },
    methods: {
      width() {
        
      }
    }
}
</script>

<style lang="scss" scoped>

.wrapper {
    
}

.profile {
    display: flex;
    padding: 25px;
    height: 300px;
    background-image: url('../img/background.jpg');
    background-repeat: no-repeat;
    background-size: cover;

    .data {
        justify-content: center;
        align-items: center;
        display: flex;
        height: 100%;
        width: 40%;
        color: white;

        ul {
            display: flex;
            flex-direction: column;
            list-style-type: none;

            li {
                
                mark {
                    background: none;
                    color: rgb(0, 186, 188);
                    text-align: left;
                }

                span {
                    text-align: right;
                }
            }
        }
    }

    .information {
        height: 100%;
        display: flex;
        flex-direction: column;
        width: 60%;

        .block {
            flex: 5 1;
            margin: 0px 0px 10px 10px;
        }

        .progress-bar {
            position: relative;
            display: flex;
            flex: 1 1;
            margin-left: 10px;

            .complete {
                display: flex;
                height: 100%;
                width: 50%;
                background: rgb(0, 186, 188);
                border-top-right-radius: 0px;
                border-bottom-right-radius: 0px;
                }

            mark {
                top: 5px;
                left: 300px;
                margin-right: 200px;
                background: transparent;
                color: white;
                position: absolute;
            }
        }
    }
}

.achievements {
    margin-top: 30px;

    h2 {
        color: rgb(0, 186, 188);
        font-size: 1.6em;
        margin-left: 25px;
    }

    .achi-list {
        border-top: 3px solid #c3c333;

        .item {
            display: flex;
            width: 250px;
            margin: 20px;

            div {
                

                h4 {
                    font-size: 1.5em;
                }
                font-size: 0.8em;
                width: 250px;
                display: flex;
                flex-direction: column;
            }
        }
    }
}

.data, .block, .progress-bar, .complete {
    background: rgba(0, 0, 0, 0.4);
    border-radius: 5px;
}



</style>