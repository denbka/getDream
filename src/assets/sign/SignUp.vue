<template>
<div class="wrapper">
    <form id="sign-up-form">
        <h1>Регистрация</h1>
        <input type="text" name="firstname" placeholder="Имя..." autocomplete="off" v-model="postBody.firstname" required>
        <input type="text" name="lastname" placeholder="Фамилия..." autocomplete="off" v-model="postBody.lastname" required>
        <input type="email" name="email" placeholder="Email..." autocomplete="off" v-model="postBody.email"  required>
        <input type="password"  name="password" placeholder="Пароль..." autocomplete="off" v-model="postBody.password" required>

        <button type="submit" @click="signUp">sign up</button>

        <router-link :to="'/sign_in'" :key="'/sign_in'">Войти в систему</router-link>
    </form>
</div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            postBody: {
                firstname: '',
                lastname: '',
                email: '',
                password: ''
            },
            message: ''
        }
    },
    methods: {
        signUp(event) {
            console.log(this.postBody);
            event.preventDefault();
            axios({
                method: 'POST',
                url: 'http://myblog/src/api/actions/user/create_user.php',
                data: this.postBody
            })
            .then(response => {
                console.log(response.data.message);
                if (response.data.message == "success")
                this.$router.push('/account')
                else if (response.data.message == "fault")
                console.log('регистрация не завершена');
            })
            .catch(error => {
                console.log(error);
            })
        },
        errors() {

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
        color: white;
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