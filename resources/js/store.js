import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        token: localStorage.getItem('access_token') || null,
        status: '',
    },
    getters: {
        loggedIn(state) {
            return state.token !== null;
        },
        authStatus: state => state.status,
    },
    mutations: {
        retrieveToken(state, token) {
            state.token = token
        },
        destroyToken(state) {
            state.token = null
        }
    },
    actions: {
        retrieveToken(context, credentials) {

            return new Promise((resolve, reject) => {
                axios.post('/api/auth/login', {
                    username: credentials.username,
                    password: credentials.password,
                })
                    .then(response => {
                        //console.log(response)
                        const token = response.data.access_token
                        localStorage.setItem('access_token', token)
                        context.commit('retrieveToken', token)

                        resolve(response)
                    })
                    .catch(error => {
                        //console.log(error)
                        reject(error)
                    })
            })

        },
        destroyToken(context) {

            if (context.getters.loggedIn) {

                return new Promise((resolve, reject) => {
                    axios.post('/api/auth/logout', '', {
                        headers: { Authorization: "Bearer " + context.state.token }
                    })
                        .then(response => {
                            localStorage.removeItem('access_token')
                            context.commit('destroyToken')

                            resolve(response)
                        })
                        .catch(error => {
                            localStorage.removeItem('access_token')
                            context.commit('destroyToken')

                            reject(error)
                        })
                })

            }
        },
        getUser(context) {
            if (context.getters.loggedIn) {
                return new Promise((resolve, reject) => {
                    axios.get('/api/auth/user', '', {
                        headers: { Authorization: "Bearer " + context.state.token }
                    })
                        .then(response => {
                            console.log('user', response.data)
                            localStorage.setItem(response.data);
                            context.commit()
                            resolve(response)
                        })
                        .catch(error => {

                            context.commit()
                            reject(error)
                        })
                })
            }
        }
    }
})

export default store
