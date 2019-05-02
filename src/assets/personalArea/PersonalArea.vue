<template>
    <div class="wrapper">
        <div class="profile">
            <div class="data">
                <ul>
                    <li>{{showFullname()}}</li>
                    <li><mark>Цель:</mark><span>{{showDream()}}</span></li>
                    <li><mark>Дримов:</mark><span>{{showCoins()}}</span></li>
                    <li><mark>Достижений:</mark><span>{{showAchievements()}}</span></li>
                </ul>
            </div>
            <div class="information">
                <div class="block">1</div>
                <div class="progress-bar">
                    <div class="complete" :style="{width: user.coins + '%'}"></div>
                    <mark>level 0 - {{user.coins}}%</mark>
                </div>
            </div>
        </div>
        <div class="achievements">
            <h2>1 достижение</h2>
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
            user: JSON.parse(localStorage.getItem("user")),
        }
    },
    methods: {
      showFullname() {
        return this.user.firstname + ' ' + this.user.lastname;
      },
      showCoins() {
        return this.user.coins
      },
      showAchievements() {
          return this.user.achievements
      },
      showDream() {
          return this.user.dream
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