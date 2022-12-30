<template>
    <p v-if="name" :class="['text-md text-red-600 dark:text-red-500', className]">
        {{ name }}
    </p>
</template>

<script>
export default {
    props: {
        name: {
            type: String,
            required: true,
        },
        className: {
            type: String,
            default: "",
        },
    },
};
</script>
