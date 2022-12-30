<template>
    <label :for="id" :class="[className, hasError ? errorClass:defaultClass]">
        {{ name }}
        <span v-if="required" class="text-red-700">*</span>
        <slot/>
    </label>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true,
            },
            required: {
                type: Boolean,
                default: true,
            },
            className: {
                type: String,
                default: "block mb-2 text-md font-medium ",
            },
            id: {
                type: String,
                default: "",
            },
            hasError: {
                type: String,
                default: false
            },
        },
        data(){
            return {
                errorClass: 'text-red-600 dark:text-red-600',
                defaultClass: 'text-gray-900 dark:text-gray-300'
            }
        }
    };
</script>
