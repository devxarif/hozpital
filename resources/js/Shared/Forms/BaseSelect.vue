<template>
    <select :id="name" :class="[className, hasError ? errorClass:defaultClass]" @change="$emit('update:value', $event.target.value)">
        <slot/>
    </select>
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
                default: "bg-gray-50 border text-md rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white",
            }
        },
        data(){
            return {
                errorClass: 'border-red-600 focus:ring-red-500 focus:border-red-500 dark:border-red-600 dark:focus:ring-red-500 dark:focus:border-red-500',

                defaultClass: 'border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500'
            }
        }
    };
</script>
