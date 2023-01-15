<template>
<Link preserve-scroll :href="href" :class="['group flex w-full items-center rounded-md py-2 pl-5 pr-2 text-sm font-medium', active ? 'text-blue-500 hover:text-blue-500':'text-gray-300 hover:bg-gray-700 hover:text-white']">
    <font-awesome-icon icon="fa-solid fa-minus" class="mr-2 h-2 w-2" :class="active ? 'text-blue-500':'text-gray-300'" />
    {{ title }}
</Link>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faMinus } from '@fortawesome/free-solid-svg-icons'

library.add(faMinus)

export default {
    props: {
        title: {
            type: String,
            required: true
        },
        href: {
            type: String,
            required: true,
        },
        active:{
            type: Boolean,
            required: true,
        }
    }
}
</script>
