<template>
    <Link preserve-scroll :href="href" :class="['group flex items-center p-2.5 text-sm font-medium rounded-lg', active ? 'bg-blue-500 text-white hover:bg-blue-500':'text-gray-300 hover:bg-gray-700 hover:text-white']">
        <slot name="icon"/>
        {{ title }}
    </Link>
    <!-- <Link :href="href" :class="['group flex items-center px-2 py-2 text-sm font-medium rounded-sm', active ? 'bg-slate-50 text-gray-900 hover:bg-gray-50 hover:text-gray-900':'text-gray-300 hover:bg-gray-700 hover:text-white']">
        <slot name="icon"/>
        {{ title }}
    </Link> -->
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true,
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
};
</script>
