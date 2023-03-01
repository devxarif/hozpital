<template>
    <li>
        <div class="flex items-center">
            <font-awesome-icon icon="fa-solid fa-chevron-right" class="w-3 h-3 text-gray-400" />
            <Link v-if="href" :href="href" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">{{ __(title) }}</Link>
            <span v-else class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">{{ __(title) }}</span>
        </div>
    </li>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        },
        href: {
            type: String,
            required: false
        }
    }
}
</script>
