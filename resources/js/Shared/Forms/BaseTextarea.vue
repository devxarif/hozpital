<template>
    <textarea :id="id" :rows="rows" :class="[className, hasError ? errorClass:defaultClass]"  :placeholder="placeholder ? __(placeholder) : ''" @input="$emit('update:modelValue', $event.target.value)" :value="modelValue"></textarea>
    <ErrorMessage :name="hasError"/>
</template>

<script>
    export default {
        props: {
            rows: {
                type: String,
                default: '4',
            },
            className: {
                type: String,
                default: 'bg-gray-50 border text-md rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white',
            },
            placeholder: {
                type: String,
                default: false
            },
            id: {
                type: String,
                default: false
            },
            hasError: {
                type: String,
                default: false
            },
            modelValue: {
                type: String,
                required: false
            }
        },
        data(){
            return {
                errorClass: 'border-red-600 focus:ring-red-500 focus:border-red-500 dark:border-red-600 dark:focus:ring-red-500 dark:focus:border-red-500',

                defaultClass: 'border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500'
            }
        }
    };
</script>
