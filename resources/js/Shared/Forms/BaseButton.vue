<template>

    <button v-if="as == 'button'" :type="type" class="w-1/2 text-sm text-center sm:w-auto focus:outline-none rounded-lg font-medium inline-flex items-center justify-center" :class="class" :disabled="disabled">
        <slot/>
    </button>
    <Link v-else :href="href" :type="type" class="w-1/2 text-sm text-center sm:w-auto focus:outline-none rounded-lg font-medium inline-flex items-center justify-center" :class="class" >
        <slot/>
    </Link>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "Save"
        },
        type: {
            type: String,
            default: "button"
        },
        class: {
            type: String,
            default: "text-white bg-blue-600 hover:bg-blue-700"
        },
        disabled: {
            type: Boolean,
            default: false
        },
        href: {
            type: String,
            default: "/"
        },
        as: {
            type: String,
            default: "button"
        }
    },
}
</script>
