<template>
    <div class="flex justify-between">
        <li :class="['flex space-x-3 h-auto', !checked ? 'line-through':'']">
            <svg v-if="checked" aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500"
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg v-else aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-500"
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                {{ __(name) }}
            </span>
        </li>
        <span v-if="!spanText"><b>{{ value }}</b></span>
    </div>
</template>

<script>
export default {
    props: {
        checked: {
            type: Boolean,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        value: {
            type: String,
            required: false,
        },
        spanText: {
            type: Boolean,
            default: false,
        },
    },
};
</script>
