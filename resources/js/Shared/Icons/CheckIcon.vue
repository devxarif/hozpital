<template>
    <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect fill="none"/><polyline fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
</template>

<script>
export default {
    props: {
        stroke: {
            type: String,
            default: 'currentColor',
        }
    }
}
</script>
