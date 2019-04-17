<template>
<div class="wrapper">
    <form id="sign-up-form">
        <h1>Войти в систему</h1>
        <input type="email" placeholder="Email..." autocomplete="off" v-model="body.email" required>
        <input type="password" placeholder="Пароль..." autocomplete="off" v-model="body.password" required>

        <button type="submit" @click="login">sign in</button>
        <router-link :to="'/sign_up'" :key="'/sign_up'">Зарегистрироваться</router-link>
    </form>
</div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            body: {
                email: 'deniskindo@mail.ru',
                password: 'i35270099'
            },
            message: ''
        }
    },

    methods: {
        login(event) {
            event.preventDefault();
            console.log('click');
            console.log(this.body);
            axios({
                method: 'POST',
                url: 'http://myblog/src/api/actions/user/autorize.php',
                data: this.body
            })
            .then(response => {
                console.log(response.data.message);
                if (response.data.message == "success") {
                    localStorage.setItem("user", JSON.stringify(response.data.user))
                    this.$router.push('/account')
                }
                else
                console.log('неправильный логин или пароль');
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style lang="scss" scoped>

.wrapper {
    background-image: url('../img/background.jpg');
    background-repeat: no-repeat;
    justify-content: center;
    background-size: cover;
    display: flex;
    height: 100vh;
}

form {
    width: 400px;
    display: flex;
    padding-top: 100px;
    flex-direction: column;

    h1 {
        color: white;
        align-self: center;
        font-size: 2em;
        padding-bottom: 25px;
    }

    input {
        margin-bottom: 25px;
        padding: 10px 0px 8px 0px;
        background-color: rgba(0, 0, 0, 0.2);
        border: 1px solid rgb(83, 100, 50);
        outline: none;
        color: #e3e3e3;
        border-radius: 1px;
        padding-left: 10px;
    }

    input::placeholder {
        color: white;
        opacity: 0.3;
    }

    input:focus {
        border: 1px solid rgb(55, 70, 138);
        background-color: rgba(0, 0, 0, 0.2);
        color: white;
        transition: 0.3s;
    }

    button {
        padding: 10px 0px;
        background: yellowgreen;
        border: none;
        color: white;
        font-size: 1.3em;
        font-weight: bold;
        text-transform: uppercase;
    }

    a {
        color: white;
        font-size: 0.8em;
        opacity: .5;
        text-align: center;
        padding-top: 15px;
        cursor: pointer;
    }
}

</style>
