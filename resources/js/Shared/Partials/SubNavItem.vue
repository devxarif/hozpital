<template>
    <Link :href="href" class="relative group flex items-center pl-6 my-2 text-lg" :class="active ? 'text-blue-500 hover:text-blue-500 font-bold':'text-gray-400 hover:text-gray-900 font-medium'">
        <span class="absolute left-0 w-1 bg-blue-500 rounded-tr-xl h-6" v-if="active"></span>
        {{ __(title) }}
    </Link>

</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: ''
        },
        active: {
            type: Boolean,
            default: false
        },
        href: {
            type: String,
            default: '#',
        }
    }
}
</script>

