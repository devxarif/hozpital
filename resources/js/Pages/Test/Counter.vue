<template>
    <!-- {{ counter }} -->

    <!-- <p @click="visitNewTab()">Hello</p> -->
    <!-- <br>
    <button @click="increment()">+</button>
    <button @click="decrement()">-</button> -->

    <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Counter Input</label>
    <div class="flex flex-row h-10 w-1/2 rounded-lg relative bg-transparent mt-1">
        <button @click="decrement()" type="button" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
            <span class="m-auto text-2xl font-thin">−</span>
        </button>
        <span class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" >{{ counter }}</span>
        <button @click="increment()" type="button" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
            <span class="m-auto text-2xl font-thin">+</span>
        </button>
    </div>

</template>

<script>
import { useCounterStore } from '@/stores/Counter'
import { mapState, mapActions } from 'pinia'

export default {
    methods:{
        ...mapActions(useCounterStore, ['decrement','increment','visitNewTab'])

        // ...mapActions(useCounterStore, { increment: 'increment', decrement: 'decrement' })


        // ...mapActions(useCounterStore, {'increment','decrement' })


        // incrementAndPrint() {
        //     this.counterStore.increment()
        //     console.log('New Count:', this.counterStore.count)
        // },
    },
    computed: {
        // ...mapState(useCounterStore, {
        //     counter: 'count'
        // })

        // ...mapState(useCounterStore, ['count'])

        ...mapState(useCounterStore, {
            counter: 'count',
            text: 'text',
            // you can also write a function that gets access to the store
            // double: store => store.count * 2,
            // // it can have access to `this` but it won't be typed correctly...
            // magicValue(store) {
            //     return store.someGetter + this.count + this.double
            // },
        }),
    }
}
</script>
