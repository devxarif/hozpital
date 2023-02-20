<template>
    <input :type="type" :id="id" class="bg-gray-50 border rounded-lg block w-full" :class="[className, hasError ? errorClass:defaultClass]"
    :placeholder="placeholder ? __(placeholder) : ''" @input="$emit('update:modelValue', $event.target.value)" :value="modelValue" :disabled="disabled">
    <ErrorMessage :name="hasError"/>
</template>

<script>
    export default {
        props: {
            type:{
                type: String,
                default: "text",
            },
            className: {
                type: String,
                default: 'text-md p-2.5',
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
            },
            disabled: {
                type: Boolean,
                default: false
            }
        },
        data(){
            return {
                errorClass: 'border-red-600 focus:ring-red-500 focus:border-red-500',

                defaultClass: 'border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500'
            }
        }
    };
</script>
