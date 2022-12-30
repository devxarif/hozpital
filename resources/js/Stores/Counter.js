import { defineStore } from 'pinia'

export const useCounterStore = defineStore('Counter', {

    state: () => ({
        count: 10,
        text: 'Arif',
        users: [],
    }),
    getters: {
        getUsers(state){
            return state.users
        }
    },
    actions: {
        increment() {
            this.count++
        },
        decrement() {
            this.count--
        },
        visitNewTab(){
            window.open('https://vueschool.io/lessons/access-pinia-actions-in-the-options-api', '_blank')
        },
        async fetchUsers() {
            try {
                const data = await axios.get('https://jsonplaceholder.typicode.com/users')
                this.users = data.data
            }
            catch (error) {
                alert(error)
                console.log(error)
            }
        }
    }


    // state: () => ({}),
    // getters: {},
    // actions: {},
})
