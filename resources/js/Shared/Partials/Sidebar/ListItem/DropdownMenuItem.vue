<template>
<a href="#" class="group flex w-full items-center rounded-md py-2 pl-5 pr-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
    <font-awesome-icon icon="fa-solid fa-circle" class="text-gray-300 mr-2 h-2 w-2"/>
    {{ title }}
</a>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCircle } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCircle)

export default {
    props: {
        title: {
            type: String,
            required: true
        }
    },
    components: {
        FontAwesomeIcon,
        faCircle
    }
}
</script>
