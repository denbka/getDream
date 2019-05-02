<template>
    <div class="wrapper">
        <form action="" method="post">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="search..." v-model="search">
        </form>
        <div class="res">
            <li v-for="item in todos" :key="item.id"></li>
        </div>
        <div class="dropdown" :class="state" id="account">
            <div @click="showMenu" class="block">
                <a class="btn btn-secondary login">{{showName()}}</a>
                <a class="btn btn-secondary avatar"></a>
            </div>
            <div class="dropdown-menu">
                <a class="" @click="showSettings">Settings</a>
                <a class="" @click="logout">Logout</a>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
  export default {
      data() {
          return {
              name: localStorage.getItem("user"),
              state: 'close',
              search: ''
          }
      },
      methods: {
          showMenu(event) {
              let s = event.path[2].className;
              console.log(s);
              if (s == 'dropdown open')
                  s = 'close'
              else
                  s = 'open'
              this.state = s;
          },
          showSettings() {
              this.$router.push('/settings')
          },
          logout() {
            localStorage.removeItem("user");
            this.$router.push('/sign_in')
          },
            showName() {
                let user = JSON.parse(localStorage.getItem("user"));
                
                return user.lastname
            },
            getData() {
                axios
                .get('http://myblog/src/api/actions/user/search.php')
                .then(response => {
                    console.log(response.data)
                }, error => {

                })
            }
      }
  }
  </script>

<style lang="scss" scoped>

.wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 40px;
    border-bottom: 1px solid #e3e3e3;
}

form {
    font-size: 13px;
    color: #4E5566;

    input {
        outline: 0;
        border: none;
        font-size: 13px;
        padding: 0px 5px;
    }
}

#account {
    display: flex;
    align-items: center;

    .login {
        color: #666;
        font-size: 1em;
        font-weight: bold;
        padding-right: 15px;
        align-self: center;
    }

    .login:active {
        background: none;
    }

    .avatar {
        width: 40px;
        height: 40px;
        display: flex;
        align-self: center;
        border-radius: 50%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url('/src/assets/img/ava.jpg');
    }
    
    .block {
        display: flex;
    }
}

.dropdown-menu {

}

.btn, .btn-secondary, .open, .close {
    border: none;
    background: none;
    color: #333;
    font-size: 1em;
    opacity: 1;
    padding: 0;
}

</style>