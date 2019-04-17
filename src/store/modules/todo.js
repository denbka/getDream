
const state = {
    newTodo: '',
    todos: []
}

const getters = {
    NEW_TODO: state => {
        return state.newTodo
    }
}

const mutations = {
    NEW_TODO: (state, payload) => {
        state.newTodo = payload
    }
}

const actions = {
    NEW_TODO: (context, payload) => {
        commit('NEW_TODO', payload)
    }
}

export default {
    state,
    getters,
    mutations,
    actions
}
