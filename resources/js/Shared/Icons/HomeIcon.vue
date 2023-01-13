<template>
    <!-- <svg :class="[className, active ? 'text-white':'text-slate-400 group-hover:text-white']" xmlns="http://www.w3.org/2000/svg" :fill="fill" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.5a8.3,8.3,0,0,1,2.6-5.9l80-72.7a8,8,0,0,1,10.8,0l80,72.7a8.3,8.3,0,0,1,2.6,5.9V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="25"></path></svg> -->


    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" :class="class" viewBox="0 0 512 512"><title>Home</title><path d="M80 212v236a16 16 0 0016 16h96V328a24 24 0 0124-24h80a24 24 0 0124 24v136h96a16 16 0 0016-16V212" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M480 256L266.89 52c-5-5.28-16.69-5.34-21.78 0L32 256M400 179V64h-48v69" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
</template>

<script>
export default {
    props: {
        fill: {
            type: String,
            default:"currentColor"
        },
        stroke: {
            type: String,
            default:"currentColor"
        },
        active:{
            type: Boolean,
            required: true,
        },
        class:{
            type: String,
            default: "w-6 h-6"
        }
    }
}
</script>
