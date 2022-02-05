import axios from 'axios'
import { removeHeaderToken, setHeaderToken } from '../utils/auth'

export default {
  state: {
    user: null,
    isLoggedIn: false
  },

  mutations: {
    set_user (state, data) {
      state.user = data
      state.isLoggedIn = true
    },

    reset_user (state) {
      state.user = null
      state.isLoggedIn = false
    }
  },

  getters: {
    isLoggedIn (state) {
      return state.isLoggedIn
    },

    user (state) {
      return state.user
    }
  },

  actions: {
    login ({ dispatch, commit }, credentials) {
      return new Promise((resolve ,reject) => {
        axios.post('/api/v1/auth/login', credentials)
          .then(response => {
            const token = response.data.results.token
            localStorage.setItem('X-STMIK-TOKEN', token)
            setHeaderToken(token)
            dispatch('get_user')
            resolve(response)
          })
          .catch(error => {
            commit('reset_user')
            localStorage.removeItem('X-STMIK-TOKEN')
            reject(error)
          })
      })
    },

    async get_user({ commit }) {
      if(!localStorage.getItem('X-STMIK-TOKEN')) {
        return
      }

      try {
        const response = await axios.get('/api/v1/session/userdata')
        commit('set_user', response.data.results)
        // console.log(response.data.results[0])
      } catch (error) {
        commit('reset_user')
        removeHeaderToken()
        localStorage.removeItem('X-STMIK-TOKEN')
        return error
      }
    },

    logout ({ commit }) {
      return new Promise((resolve) => {
        axios.post('/api/v1/auth/logout')
          .then((response) => {
            commit('reset_user')
            localStorage.removeItem('X-STMIK-TOKEN')
            removeHeaderToken()
            resolve()
          })
          .catch((response) => {
            console.log('error logout')
          })
      })
    }
  }
}