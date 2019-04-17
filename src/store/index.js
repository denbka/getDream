import Vue from 'vue'
import Vuex from 'vuex'
// import Axios from 'axios'
import todos from './modules/todo'

Vue.use(Vuex);



export const store = new Vuex.Store({
  modules: {
    todos
  }
});

/*
state хранит все переменные
getters -

getters: {
  NAME: state => {
    return state.var
  }
}

Для того чтобы установить state, нужно использовать мутации.

this.$store.getters.NAME - обращение к NAME
Разница между мутациями и действиями.
mutations: {
  SET_NAME: (state, payload) => {
    {state.name = payload};
  }
}

actions: {
  SET_NAME: (context, payload) => {
    context.commit("SET_NAME", payload)
  }
}

this.$store.commit("SET_NAME", 'denis') - меняет State 
this.$store.dispatch("SET_NAME", 'aram') - меняет Payload В мутации, которая меняет state
this.$store - context.
мутации трогаем только через actions


*/